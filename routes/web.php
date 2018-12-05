<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// ADMIN PANEL
Route::resource('/admin/category', 'Admin\CategoryController');
Route::resource('/admin/brand', 'Admin\BrandController');
Route::resource('/admin/product', 'Admin\ProductController');
Route::post('/admin/image/destroy/', 'Admin\ImagesController@destroy')->name('image.destroy');

//
Route::get('/', 'Shop\MainController@index')->name('shop.main');
Route::get('/categories/{slug}', 'Shop\CategoryController@show')->name('shop.category');
Route::get('/product/{productSlug}', 'Shop\ProductController@show')->name('shop.product');

// SHOPPING CART
Route::get('/cart', 'Shop\CartController@show')->name('shop.cart');
Route::post('/cart/add', 'Shop\CartController@add')->name('shop.cart.add');


