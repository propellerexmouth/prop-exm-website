const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');


if (mix.config.inProduction) {
    mix.version()
} else {
    mix.browserSync({
        files: [
            'public/css/*.css', // This is the one required to get the CSS to inject
            // 'public/js/**/*.js',
            'resources/views/**/*.php',
            'routes/*.php'
        ],
        proxy: 'http://propeller-website.dev',
        logPrefix: "Laravel Mix BrowserSync",
        logConnections: false,
        reloadOnRestart: false,
        notify: false,
        open: false
    });
}