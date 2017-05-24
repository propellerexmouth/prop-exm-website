<?php

namespace App\Http\Controllers;

use DrewM\MailChimp\MailChimp;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    protected $listID = '8ccf933f50';
    protected $mailchimp;

    public function __construct()
    {
        $api_key = config('services.mailchimp.key');

        if ($api_key === null) {
            throw new \Exception('No API Key set for MaliChimp');
        }

        $this->mailchimp = new MailChimp($api_key);
    }


    public function store(Request $request)
    {
        $data = $request->only(['first_name', 'last_name', 'email']);

        $rules = [
            'first_name' => 'required',
            'email'      => 'required|email'
        ];

        $messages = [
            'first_name.required' => 'We really need your first name',
            'email.required'      => 'So that we can email you updates... We\'ll be needing your email address',
            'email.email'         => 'Oops! That doesn\'t appear to be a valid email address',
        ];

        $validator = \Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors = json_decode($errors);

            return response()->json([
                'success' => false,
                'message' => 'We couldn\'t subscribe you - please sort the issues and try again.',
                'errors'  => $errors,
            ], 422);
        }

        $this->mailchimp->post("lists/$this->listID/members", [
            'email_address' => $data['email'],
            'status'        => 'subscribed',
            'merge_fields'  => ['FNAME' => $data['first_name'], 'LNAME' => $data['last_name']],
        ]);

        if ($this->mailchimp->success()) {
            return response()->json([
                'success' => true,
                'message' => 'Great! Thanks ' . $data['first_name'] . ', we\'ve added you to our group'
            ], 200);
        } else {
            $response = json_decode($this->mailchimp->getLastResponse()['body']);
            switch ($response->title) {
                case 'Member Exists':
                    $message = 'Looks like you\'re already on the list!';
                    break;
                default:
                    $message = 'Something went wrong adding you to the list!';
                    break;
            }

            return response()->json([
                'success' => false,
                'message' => $message
            ], 422);
        }
    }
}
