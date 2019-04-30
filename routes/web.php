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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('items', 'ItemController@index');
Route::get('items/{item}', 'ItemController@show');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UserController');
    Route::get('items/create', 'ItemController@create');
    Route::post('items', 'ItemController@store');
    Route::get('items/{item}/edit', 'ItemController@edit');
    Route::patch('items/{item}', 'ItemController@update');
    Route::delete('items/{item}', 'ItemController@delete');
});

/* Redirect all other links to index page */
Route::get('/{any}', 'PageController@index')->where('any', '.*');
