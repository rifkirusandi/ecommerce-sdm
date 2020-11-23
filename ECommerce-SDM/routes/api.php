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

<<<<<<< HEAD
Route::get('penggajian', 'PenggajianController@index');
Route::get('/penggajian/{id}', 'PenggajianController@show');
Route::post('penggajian', 'PenggajianController@create');
Route::put('/penggajian/{id}', 'PenggajianController@update');
Route::delete('/penggajian/{id}', 'PenggajianController@delete');
=======
Route::get('/pegawai', 'PegawaiController@getAllPegawai');
Route::get('/pegawai/{id}', 'PegawaiController@getPegawai');

Route::post('/pegawai', 'PegawaiController@insertPegawai');
>>>>>>> 7bef1ff4a6624c6177341d940adec51203d89fb9
