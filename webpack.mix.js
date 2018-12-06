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

mix.styles([
    'resources/assets/css/bootstrap.min.css',
    'resources/assets/css/ionicons.min.css',
    'resources/assets/css/jquery-jvectormap.css',
    'resources/assets/css/AdminLTE.min.css',
    'resources/assets/css/_all-skins.min.css',
    'resources/assets/css/jquery-confirm.min.css',
], 'public/assets/css/all.css');

mix.styles([
    'resources/assets/shop/css/shop-homepage.css',
    'resources/assets/shop/vendor/bootstrap/css/bootstrap.min.css',
    'resources/assets/css/jquery-confirm.min.css',
], 'public/assets/shop/css/all.css');

mix.scripts([
    'resources/assets/js/jquery.min.js',
    'resources/assets/js/bootstrap.min.js',
    'resources/assets/js/fastclick.js',
    'resources/assets/js/adminlte.min.js',
    'resources/assets/js/jquery.sparkline.min.js',
    'resources/assets/js/jquery.slimscroll.min.js',
    'resources/assets/js/jquery-confirm.min.js',
    'resources/assets/js/images.js',
], 'public/assets/js/all.js');

// mix.scripts([
//     'resources/assets/shop/vendor/jquery/jquery.min.js',
//     'resources/assets/shop/vendor/bootstrap/js/bootstrap.bundle.min.js',
//     'resources/assets/shop/js/scripts.js',
//     'resources/assets/js/jquery-confirm.min.js',
// ], 'public/assets/shop/js/all.js');

mix.js([
    // 'resources/assets/shop/vendor/jquery/jquery.min.js',
    // 'resources/assets/shop/vendor/bootstrap/js/bootstrap.bundle.min.js',
    // 'resources/assets/js/jquery-confirm.min.js',
    'resources/assets/shop/js/common.js',
], 'public/assets/shop/js/scripts.js');
