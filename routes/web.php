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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'WelcomeController@index')->middleware('auth');


Route::group(['middleware' => ['admin']], function () {
    Route::get('list-user', 'AdminController@listuser')->name('list-user');
    Route::get('create-user', 'AdminController@createuser')->name('create-user');
    Route::post('store-user', 'AdminController@storeuser')->name('store-user');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
