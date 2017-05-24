<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $instagram_posts = [];
    $instagram_token = Cache::get('INSTAGRAM_GENERATED_TOKEN');
    if ($instagram_token !== null) {

        $instagram_posts = Cache::remember('instagram_posts', 30, function () use ($instagram_token) {
            $feed_request = Instagram::getAuthenticatedRequest(
                'GET',
                'https://api.instagram.com/v1/users/self/media/recent',
                $instagram_token,
                ['COUNT' => 8]
            );
            $client = new \GuzzleHttp\Client();
            $feed_response = $client->send($feed_request);
            $instagram_feed = json_decode($feed_response->getBody()->getContents());
            return $instagram_feed->data;
        });
    }

    return view('welcome',[
        'instagram_posts' => $instagram_posts
    ]);
});

Route::post('/subscribe', ['uses' => 'SubscriptionController@store']);

Route::get('/oauth/instagram', function(Request $request){
    
    $authUrl = Instagram::authorize([], function ($url, $provider) use ($request) {
        $request->session()->put('instagramState', $provider->getState());
        return $url;
    });

    return redirect()->away($authUrl);
});

Route::get('/oauth/instagram/callback', function(Request $request) {

    if (!$request->has('state') || $request->state !== $request->session()->get('instagramState')) {
        abort(400, 'Invalid state');
    }

    if (!$request->has('code')) {
        abort(400, 'Authorization code not available'); 
    }

    $token = Instagram::getAccessToken('authorization_code', [
        'code' => $request->code,
    ]);
    Cache::forever('INSTAGRAM_GENERATED_TOKEN', $token);

    return "Instgram token generated";
});