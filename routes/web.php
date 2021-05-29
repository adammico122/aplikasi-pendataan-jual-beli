<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\RefillController;
use App\Http\Controllers\PinjamanController;

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
Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
Route::get('/produk/jenis', [ProdukController::class, 'indexJenis'])->name('jenis');
Route::get('/produk/tambah', [ProdukController::class, 'create']);
Route::get('/jenis/tambah', [ProdukController::class, 'createJenis']);
Route::get('/jenis/delete/{id_jenis}', [ProdukController::class, 'destroyJenis']);
Route::post('/produk/tambah/data', [ProdukController::class, 'store']);
Route::post('/produk/tambah/jenis', [ProdukController::class, 'storeJenis']);
Route::get('/produk/delete/{id_produk}', [ProdukController::class, 'destroy']);
Route::get('/produk/edit/{id_produk}', [ProdukController::class, 'edit']);
Route::post('/produk/edit/{id_produk}', [ProdukController::class, 'update']);

Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
Route::get('/transaksi/tambah', [TransaksiController::class, 'create']);
Route::post('/transaksi/tambah/data', [TransaksiController::class, 'store']);
Route::get('/transaksi/delete/{id_transaksi}', [TransaksiController::class, 'destroy']);
Route::get('/transaksi/edit/{id_transaksi}', [TransaksiController::class, 'edit']);
Route::post('/transaksi/edit/{id_transaksi}', [TransaksiController::class, 'update']);
Route::post('/transaksi/getData', [TransaksiController::class, 'getData']);
Route::post('/transaksi/hitungHarga', [TransaksiController::class, 'hitung']);

Route::get('/refill', [RefillController::class, 'index'])->name('refill');
Route::get('/refill/tambah', [RefillController::class, 'create']);
Route::get('/refill/delete/{id_refill}', [RefillController::class, 'destroy']);
Route::get('/refill/edit/{id_refill}', [RefillController::class, 'edit']);
Route::post('/refill/edit/{id_refill}', [RefillController::class, 'update']);
Route::post('/refill/tambah/data', [RefillController::class, 'store']);

Route::get('/pinjaman', [PinjamanController::class, 'index'])->name('peminjam');
Route::get('/pinjaman/tambah', [PinjamanController::class, 'create']);
Route::get('/pinjaman/delete/{id_pinjaman}', [PinjamanController::class, 'destroy']);
Route::get('/pinjaman/edit/{id_pinjaman}', [PinjamanController::class, 'edit']);
Route::post('/pinjaman/edit/{id_pinjaman}', [PinjamanController::class, 'update']);
Route::post('/pinjaman/tambah/data', [PinjamanController::class, 'store']);

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
