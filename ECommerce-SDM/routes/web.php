<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Pegawai //
Route::get('pegawai', 'PegawaiController@list')->name('listPegawai');
Route::get('tambahPegawai', 'PegawaiController@tambah');
Route::post('insertPegawai', 'PegawaiController@create1')->name('createPegawai');

// Penggajian //
Route::get('penggajian', 'PenggajianController@list')->name('listPenggajian');
Route::get('tambahPenggajian', 'PenggajianController@tambah');
Route::post('insertPenggajian', 'PenggajianController@create1')->name('createPenggajian');

// Absensi //
Route::get('absensi', 'AbsensiController@list');
Route::get('tambahAbsensi', 'AbsensiController@tambah')->name('createAbsensi');
Route::post('insertAbsensi', 'AbsensiController@create1')->name('createAbsensi');

// Kas Keluar //
Route::get('kasKeluar', 'ExternalController@finance')->name('inputKasKeluar');

// Advertisement //
Route::get('advertisement', 'ExternalController@sales')->name('createAdvert');
