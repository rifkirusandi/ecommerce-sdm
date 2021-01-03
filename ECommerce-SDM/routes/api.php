<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'UserController@login');
Route::post('/register', 'UserController@register');

Route::get('/user', 'UserController@getAllUser');
Route::get('/user/{id}', 'UserController@getUser');

Route::group(['middleware' => 'auth:api'], function(){
Route::post('details', 'UserController@details');
});

//-------------------------------------------------------------------//

Route::get('/penggajian', 'PenggajianController@index');
Route::get('/penggajian/{id}', 'PenggajianController@show');
Route::post('/penggajian', 'PenggajianController@create');
Route::put('/penggajian/{id}', 'PenggajianController@update');
Route::delete('/penggajian/{id}', 'PenggajianController@delete');

//-------------------------------------------------------------------//

Route::get('/pegawai', 'PegawaiController@getAllPegawai');
Route::get('/pegawai/{id}', 'PegawaiController@getPegawai');
Route::post('/pegawai', 'PegawaiController@insertPegawai');

//-------------------------------------------------------------------//

Route::get('/absensi', 'AbsensiController@getAbsensi');
Route::post('/absensi', 'AbsensiController@insertAbsensi');
