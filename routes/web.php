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
/* 
Route::get('/checkout/{amt}/{id}', function () {
    return view('checkout');
}); */
/* Route::get('/welcome', function () {
    return view('welcome');
}); */

// Route::get('my-store', 'razorpay\PaymentController@show_products');
Route::get('/', 'razorpay\PaymentController@show_products');
Route::get('/checkout', 'razorpay\PaymentController@checkout')->middleware('CheckLogin');
Route::post('pay-success', 'razorpay\PaymentController@pay_success');
Route::post('thank-you', 'razorpay\PaymentController@thank_you');

Route::get('login', 'admin\LoginController@index');
Route::post('login/action', 'admin\LoginController@login');
Route::get('logout', 'admin\LoginController@logout');