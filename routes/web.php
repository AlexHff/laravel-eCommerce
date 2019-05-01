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
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cart/show', 'CartController@show')->name('cart.show');
Route::post('/cart/delete', 'CartController@delete')->name('cart.delete');
Route::post('/cart/add', 'CartController@add')->name('cart.add');

/* These routes will redirect if and only if the user is logged in */
Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UserController');
    Route::resource('items', 'ItemController');
});

/* Redirect all other links to index page */
Route::get('/{any}', 'PageController@index')->where('any', '.*')->name('index');
