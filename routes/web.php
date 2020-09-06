<?php

use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Auth::routes();
Route::get('/home', 'DashboardController@index');

// dashboard
Route::get('/dashboard', 'DashboardController@index');

// pengguna
Route::get('/pengguna', 'UserController@index')->middleware('akses.admin');
Route::get('/pengguna-create', 'UserController@create')->middleware('akses.admin');
Route::post('/pengguna-add', 'UserController@add')->middleware('akses.admin');
Route::get('/pengguna-detail/{id}', 'UserController@detail')->middleware('akses.admin');
Route::get('/pengguna-edit/{id}', 'UserController@edit')->middleware('akses.admin');
Route::post('/pengguna-update', 'UserController@update')->middleware('akses.admin');
Route::get('/pengguna-delete/{id}', 'UserController@destroy')->middleware('akses.admin');

// tabel buku
Route::get('/buku', 'BukuController@index');
Route::get('/buku-create', 'BukuController@create');
Route::post('/buku-add', 'BukuController@add');
Route::get('/buku-detail/{id}', 'BukuController@detail');
Route::get('/buku-edit/{id}', 'BukuController@edit');
Route::post('/buku-update', 'BukuController@update');
Route::get('/buku-delete/{id}', 'BukuController@destroy');

// tabel kategori
Route::get('/kategori', 'KategoriController@index');
Route::get('/kategori-create', 'KategoriController@create');
Route::post('/kategori-add', 'KategoriController@add');
Route::get('/kategori-detail/{id}', 'KategoriController@detail');
Route::get('/kategori-edit/{id}', 'KategoriController@edit');
Route::post('/kategori-update', 'KategoriController@update');
Route::get('/kategori-delete/{id}', 'KategoriController@destroy');

// tabel peminjam
Route::get('/peminjam', 'PeminjamController@index');
Route::get('/peminjam-create', 'PeminjamController@create');
Route::post('/peminjam-add', 'PeminjamController@add');
Route::get('/peminjam-detail/{id}', 'PeminjamController@detail');
Route::get('/peminjam-edit/{id}', 'PeminjamController@edit');
Route::post('/peminjam-update', 'PeminjamController@update');
Route::get('/peminjam-delete/{id}', 'PeminjamController@destroy');

// tabel transaksi
Route::get('/transaksi', 'TransaksiController@index')->name('transaksi');
Route::get('/transaksi-create', 'TransaksiController@create');
Route::post('/transaksi-add', 'TransaksiController@add');
Route::get('/transaksi-detail/{id}', 'TransaksiController@detail');
Route::get('/transaksi-edit/{id}', 'TransaksiController@edit');
Route::post('/transaksi-update', 'TransaksiController@update');
Route::get('/transaksi-delete/{id}', 'TransaksiController@destroy');
Route::get('/transaksi-approve/{id}', 'TransaksiController@approveBook');
Route::get('scheduler/cron/{cron_name}', 'Cron\TransaksiJatuhTempoController@callCron');
Route::get('/transaksi-masa-peminjaman', 'TransaksiController@masaPeminjaman');
Route::get('/transaksi-masa-peminjaman/{id}', 'TransaksiController@masaPeminjaman');
Route::get('/transaksi-sudah-dikembalikan', 'TransaksiController@sudahDikembalikan');
Route::get('/transaksi-sudah-dikembalikan/{id}', 'TransaksiController@sudahDikembalikan');
Route::get('/transaksi-belum-dikembalikan', 'TransaksiController@belumDikembalikan');
Route::get('/transaksi-belum-dikembalikan/{id}', 'TransaksiController@belumDikembalikan');
