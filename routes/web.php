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
Route::get('/masukkan_keranjang/{id}', 'HomeController@masukkan_keranjang')->name('masukkan_keranjang');
Route::get('/keranjang', 'HomeController@keranjang')->name('keranjang');
Route::get('/hapus_keranjang/{id}', 'HomeController@hapus_keranjang')->name('hapus_keranjang');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profil', 'ProfilController@index')->name('profil');
});
