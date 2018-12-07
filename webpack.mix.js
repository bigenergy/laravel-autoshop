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

/* FOR ADMIN PANEL */

mix.styles([
    'resources/assets/css/bootstrap.min.css',
    'resources/assets/css/ionicons.min.css',
    'resources/assets/css/jquery-jvectormap.css',
    'resources/assets/css/AdminLTE.min.css',
    'resources/assets/css/_all-skins.min.css',
    'resources/assets/css/jquery-confirm.min.css',
], 'public/assets/css/all.css');

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

/* FOR SHOP CLIENT INTERFACE */

mix.styles([
    'resources/assets/shop/css/shop-homepage.css',
], 'public/assets/shop/css/all.css');

mix.js([
    'resources/assets/shop/js/common.js',
], 'public/assets/shop/js/scripts.js');

/* FONTAWESOME 5 & BOOTSTRAP 4.1.3 */

mix.sass('resources/sass/app.scss', 'public/css');