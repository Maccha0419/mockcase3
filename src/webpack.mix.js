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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/top.js', 'public/js')
    .js('resources/js/like.js', 'public/js')
    .js('resources/js/comment.js', 'public/js')
    .js('resources/js/mypage.js', 'public/js')
    .js('resources/js/profile.js', 'public/js')
    .js('resources/js/sell.js', 'public/js')
    .js('resources/js/checkout.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/top.scss', 'public/css')
    .sass('resources/sass/like.scss', 'public/css')
    .sass('resources/sass/comment.scss', 'public/css')
    .sass('resources/sass/mypage.scss', 'public/css')
    .sass('resources/sass/profile.scss', 'public/css')
    .sass('resources/sass/sell.scss', 'public/css')
    .version();
