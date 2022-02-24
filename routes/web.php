<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'FrontentController@index')->name('index');

Route::get('product/front/{product}', 'FrontentController@show')->name('showProduct');
Route::post('/cart/add', [
	'uses' => 'ShopController@add_to_cart',
	'as' => 'cart.add'
]);

Route::get('cart', 'ShopController@cart')->name('cart');
Route::get('cart/delete/{product}', 'ShopController@cart_delete')->name('cart.delete');

Route::get('cart/checkout', 'CheckoutController@index')->name('cart.checkout');
Route::post('cart/checkout', 'CheckoutController@pay')->name('cart.checkout.pay');

//cart - quantity selection
Route::get('cart/decreasing/{id}/{qty}', 'ShopController@cart_qty_decreasing')->name('cart.decreasing');
Route::get('cart/increasing/{id}/{qty}', 'ShopController@cart_qty_increasing')->name('cart.increasing');

Auth::routes();


	Route::resource('product', 'ProductController');
	Route::get('/home', [HomeController::class, 'index'])->name('home');



