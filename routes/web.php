<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\produkController;
use App\Http\Controllers\konsumenController;
use App\Http\Controllers\transaksiController;
use App\Http\Controllers\detailTransaksiController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\emailController;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

Route::get('/', [dashboardController::class, 'index'])->name('home');

Route::get('/kategori', [kategoriController::class, 'index'])->name('kategori.index');
Route::post('/kategori', [kategoriController::class, 'store'])->name('kategori.store');
Route::put('/kategori/{id}', [kategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{id}', [kategoriController::class, 'destroy'])->name('kategori.destroy');

Route::get('/produk', [produkController::class, 'index'])->name('produk.index');
Route::post('/produk', [produkController::class, 'store'])->name('produk.store');
Route::put('/produk/{id}', [produkController::class, 'update'])->name('produk.update');
Route::delete('/produk/{id}', [produkController::class, 'destroy'])->name('produk.destroy');

Route::post('/produk/import', [produkController::class, 'import'])->name('produk.import');

Route::get('/konsumen', [konsumenController::class, 'index'])->name('konsumen.index');
Route::post('/konsumen', [konsumenController::class, 'store'])->name('konsumen.store');
Route::put('/konsumen/{id}', [konsumenController::class, 'update'])->name('konsumen.update');
Route::delete('/konsumen/{id}', [konsumenController::class, 'destroy'])->name('konsumen.destroy');

Route::get('/transaksi', [transaksiController::class, 'index'])->name('transaksi.index');
Route::get('/transaksi/{id}', [transaksiController::class, 'show'])->name('transaksi.show');
Route::post('/transaksi', [transaksiController::class, 'store'])->name('transaksi.store');
Route::put('/transaksi/{id}', [transaksiController::class, 'update'])->name('transaksi.update');
Route::delete('/transaksi/{id}', [transaksiController::class, 'destroy'])->name('transaksi.destroy');

Route::post('/detail-transaksi', [detailTransaksiController::class, 'store'])->name('detail-transaksi.store');
Route::put('/detail-transaksi/{id}', [detailTransaksiController::class, 'update'])->name('detail-transaksi.update');
Route::delete('/detail-transaksi/{id}', [detailTransaksiController::class, 'destroy'])->name('detail-transaksi.destroy');

Route::get('email', [emailController::class, 'sendEmail'])->name('email.send');

