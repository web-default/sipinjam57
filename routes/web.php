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

// Route::get('/', 'WelcomeController@index')->middleware('auth');
Route::get('/', 'WelcomeController@index');

Route::group(['middleware' => ['admin']], function () {
    Route::get('list-user', 'AdminController@listuser')->name('list-user');
    Route::get('create-user', 'AdminController@createuser')->name('create-user');
    Route::post('store-user', 'AdminController@storeuser')->name('store-user');
});

Route::group(['middleware' => ['auth']] , function(){

	// edit profile
	Route::get('admin/{admin}/admin_edit-profile', 'AdminController@admin_edit_profile');
	Route::put('admin/{admin}', 'AdminController@admin_update_profile');

	Route::get('mahasiswa/{mahasiswa}/mahasiswa_edit-profile', 'MahasiswaController@mahasiswa_edit_profile');
	Route::put('mahasiswa/{mahasiswa}', 'MahasiswaController@mahasiswa_update_profile');

	Route::get('dosen/{dosen}/dosen_edit-profile', 'DosenController@dosen_edit_profile');
	Route::put('dosen/{dosen}', 'DosenController@Dosen_update_profile');

	Route::get('karyawan/{karyawan}/karyawan_edit-profile', 'KaryawanController@karyawan_edit_profile');
	Route::put('karyawan/{karyawan}', 'KaryawanController@karyawan_update_profile');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
