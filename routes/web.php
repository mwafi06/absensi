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

Route::get('auths/login','AuthController@login')->name('login');
Route::post('loginpost','AuthController@loginpost');
Route::get('auths/register', 'AuthController@register');
Route::post('registerPost', 'AuthController@registerPost');
Route::get('logout', 'AuthController@logout');

/*
 * routes for ijin
 */
Route::get('/','AbsenController@index');
Route::get('/absen','AbsenController@index')->name('absen');
Route::post('/absen/save','AbsenController@save');
Route::post('absensi/request-izin','AbsenController@requestIzin');

Route::group(['middleware' => 'auth'],function(){
	Route::get('index','HomeController@index');
	Route::get('karyawan','ControllerKaryawan@index');
	Route::get('karyawan/create','ControllerKaryawan@create');
	Route::post('karyawan/store','ControllerKaryawan@store');
	Route::get('karyawan/edit/{id}','ControllerKaryawan@edit');
	Route::put('karyawan/update/{id}','ControllerKaryawan@update');
	Route::get('karyawan/destroy/{id}','ControllerKaryawan@destroy');

    /*
	 * routes for absensi
	 */
    Route::get('absensi','AbsenController@list');
	Route::post('absensi/update-status','AbsenController@updateStatus');
});

Route::group(['middleware' => 'auth:karyawan'],function(){
	Route::get('karyawan/detail','ControllerKaryawan@show');
	 Route::get('karyawan/createExport', 'ExportController@createExport');
	 Route::get('karyawan/export', 'ExportController@exportFile');
});