const mix = require('laravel-mix');

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
/*
mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');*/

//Css general
mix.styles([
   'resources/css/bootstrap.css',
   'resources/css/toastr.css'
   ], 'public/css/app.css');
//Js general
mix.scripts([
   'resources/js/jquery.js',
   'resources/js/bootstrap.js'], 'public/js/app.js');
