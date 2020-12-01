<?php

use Illuminate\Support\Facades\Auth;
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

Route::redirect('/', '/home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('/products/search', 'ProductController@search')->name('products.search');
Route::get('/products/{product}', 'ProductController@show')->name('products.show');


Route::resource('products', 'ProductController');


Route::get('/add-to-cart/{product}', 'CartController@add')->name('cart.add')->middleware('auth');

Route::get('/cart', 'CartController@index')->name('cart.index')->middleware('auth');
Route::get('/cart/destroy/{itemId}', 'CartController@destroy')->name('cart.destroy')->middleware('auth');
Route::get('/cart/update/{itemId}', 'CartController@update')->name('cart.update')->middleware('auth');
Route::get('/cart/checkout', 'CartController@checkout')->name('cart.checkout')->middleware('auth');
Route::get('/cart/apply-coupon', 'CartController@applyCoupon')->name('cart.coupon')->middleware('auth');
Route::get('/cart/checkdate/{itemId}', 'CartController@check')->name('cart.check')->middleware('auth');

Route::resource('orders', 'OrderController')->middleware('auth');
Route::get('/orders', 'OrderController@index')->name('orders.index')->middleware('auth');
Route::get('/history', 'OrderController@history')->name('orders.history')->middleware('auth');
Route::get('/project', 'OrderController@project')->name('orders.project')->middleware('auth');
Route::post('/accept', 'OrderController@accept')->name('orders.accept')->middleware('auth');
Route::post('/reject', 'OrderController@reject')->name('orders.reject')->middleware('auth');
Route::post('/complete', 'OrderController@complete')->name('orders.complete')->middleware('auth');


Route::resource('fotografer','ShopController')->middleware('auth');
Route::get('/create', 'ShopController@create')->name('shops.create')->middleware('auth');
Route::post('create', 'ShopController@store')->name('shops.store')->middleware('auth');
Route::get('/fotografer/{fotografer}', 'ShopController@show')->name('shops.show');

Route::resource('review','ProductReviewController')->middleware('auth');

Route::get('/reviews/{order}','ProductReviewController@review')->name('review.product')->middleware('auth');
Route::get('/withdraw_funds/{order}','WithdrawFundsController@withdraw')->name('withdraw.funds')->middleware('auth');

Route::get('paypal/checkout/{order}', 'PayPalController@getExpressCheckout')->name('paypal.checkout');
Route::get('paypal/checkout-success/{order}', 'PayPalController@getExpressCheckoutSuccess')->name('paypal.success');
Route::get('paypal/checkout-cancel', 'PayPalController@cancelPage')->name('paypal.cancel');

Route::post('payments/notification', 'MidtransController@notification');
Route::get('payments/checkout/{order}', 'MidtransController@_generatePaymentToken')->name('midtrans.checkout');
Route::get('payments/completed', 'MidtransController@completed');
Route::get('payments/failed', 'MidtransController@failed');
Route::get('payments/unfinish', 'MidtransController@unfinish');

Route::get('/inbox', 'MessageController@index')->name('inbox')->middleware('auth');
Route::get('/message/{id}', 'MessageController@getMessage')->name('message');
Route::post('message', 'MessageController@sendMessage');
Route::post('send', 'MessageController@firstMessage')->name('first.message')->middleware('auth');
Route::post('withdraw', 'WithdrawFundsController@reqFunds')->name('req.funds')->middleware('auth');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
