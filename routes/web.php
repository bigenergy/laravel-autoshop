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
Route::get('/cart', 'Shop\CartController@showCart')->name('shop.cart');
Route::get('/cart/detail', 'Shop\CartController@showDetail')->name('shop.cart.detail');
Route::get('/cart/complete', 'Shop\CartController@showComplete')->name('shop.cart.detail');

Route::post('/cart/add', 'Shop\CartController@addToCart')->name('shop.cart.add');
Route::post('/cart/destroy', 'Shop\CartController@destroyInCart')->name('shop.cart.destroy');
Route::post('/cart/edit', 'Shop\CartController@editCart')->name('shop.cart.edit');
Route::post('/cart/detail/write', 'Shop\CartController@writeDetail')->name('shop.cart.detail.write');


