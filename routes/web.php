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

Auth::routes();

Route::get('/categories', 'PageController@categories')->name('categories');
Route::get('/deals', 'PageController@deals')->name('deals');
Route::get('/home', 'HomeController@index')->name('home');

/* These routes will redirect if and only if the user is logged in */
Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UserController');
    Route::resource('items', 'ItemController');
    Route::post('/items/search', 'ItemController@search')->name('items.search');
    Route::get('/cart/show', 'CartController@show')->name('cart.show');
    Route::post('/cart/delete', 'CartController@delete')->name('cart.delete');
    Route::post('/cart/add', 'CartController@add')->name('cart.add');
    Route::get('/payment/show', 'PaymentController@show')->name('payment.show');
    Route::get('/payment/create', 'PaymentController@create')->name('payment.create');
    Route::post('/payment/store', 'PaymentController@store')->name('payment.store');
    Route::post('/payment/delete', 'PaymentController@delete')->name('payment.delete');
    Route::get('/payment/pay', 'PaymentController@pay')->name('payment.pay');
    Route::post('/payment/validation', 'PaymentController@validation')->name('payment.validation');
    Route::get('/payment/success', 'PaymentController@success')->name('payment.success');
});

/* Redirect all other links to index page */
Route::get('/{any}', 'PageController@index')->where('any', '.*')->name('index');
