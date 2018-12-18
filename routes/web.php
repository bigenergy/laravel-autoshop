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
Route::resource('/admin/order', 'Admin\OrderController');
Route::resource('/admin/status', 'Admin\StatusController');

Route::post('/admin/image/destroy/', 'Admin\ImagesController@destroy')->name('image.destroy');

Route::post('admin/orders/get_info', 'Admin\OrderController@orderInfo');
Route::post('admin/orders/destroy', 'Admin\OrderController@destroy');


//
Route::get('/', 'Shop\MainController@index')->name('shop.main');
Route::get('/categories/{slug}', 'Shop\CategoryController@show')->name('shop.category');
Route::get('/product/{productSlug}', 'Shop\ProductController@show')->name('shop.product');

// SHOPPING CART
Route::get('/cart', 'Shop\CartController@showCart')->name('shop.cart');

Route::get('/order/detail', 'Shop\OrderController@showDetail')->name('shop.order.detail');
Route::get('/order/complete', 'Shop\OrderController@showComplete')->name('shop.order.complete');

Route::post('/cart/add', 'Shop\CartController@addToCart')->name('shop.cart.add');
Route::post('/cart/destroy', 'Shop\CartController@destroyInCart')->name('shop.cart.destroy');
Route::post('/cart/edit', 'Shop\CartController@editCart')->name('shop.cart.edit');

Route::post('/order/detail/write', 'Shop\OrderController@writeDetail')->name('shop.order.detail.write');


