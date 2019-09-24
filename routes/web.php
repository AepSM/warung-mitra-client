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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::any('/search', 'HomeController@search')->name('search');
Route::get('/detail_produk/{id}', 'HomeController@detail_produk')->name('detail_produk');

Route::get('/tampil_keranjang', 'KeranjangController@index')->name('keranjang.index');
Route::get('/masukkan_keranjang/{id}', 'KeranjangController@masukkan_keranjang')->name('keranjang.masukkan_keranjang');
Route::get('/beli_keranjang/{id}', 'KeranjangController@beli')->name('keranjang.beli');
Route::get('/data_keranjang', 'KeranjangController@data')->name('keranjang.data');
Route::post('/tambah_data_keranjang', 'KeranjangController@tambah_data')->name('keranjang.tambah_data');
Route::get('/hapus_keranjang/{id}', 'KeranjangController@hapus')->name('keranjang.hapus');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profil', 'ProfilController@index')->name('profil');
});
