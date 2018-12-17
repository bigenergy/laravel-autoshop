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
    'resources/assets/admin/css/bootstrap.min.css',
    'resources/assets/admin/css/ionicons.min.css',
    'resources/assets/admin/css/jquery-jvectormap.css',
    'resources/assets/admin/css/AdminLTE.min.css',
    'resources/assets/admin/css/_all-skins.min.css',
    'resources/assets/admin/css/jquery-confirm.min.css',
], 'public/assets/css/all.css');

mix.js([
    'resources/assets/admin/js/common.js',
], 'public/assets/admin/js/scripts.js');

mix.scripts([
    'resources/assets/admin/vendor/js/jquery.min.js',
    'resources/assets/admin/vendor/js/bootstrap.min.js',
    'resources/assets/admin/vendor/js/fastclick.js',
    'resources/assets/admin/vendor/js/adminlte.min.js',
    'resources/assets/admin/vendor/js/jquery.sparkline.min.js',
    'resources/assets/admin/vendor/js/jquery.slimscroll.min.js',
    'resources/assets/admin/vendor/js/jquery-confirm.min.js',
    'resources/assets/admin/js/images.js',
], 'public/assets/admin/js/all.js');

/* FOR SHOP CLIENT INTERFACE */

mix.styles([
    'resources/assets/shop/css/shop-homepage.css',
], 'public/assets/shop/css/all.css');

mix.js([
    'resources/assets/shop/js/common.js',
], 'public/assets/shop/js/scripts.js');

/* FONTAWESOME 5 & BOOTSTRAP 4.1.3 */

mix.sass('resources/sass/app.scss', 'public/css');