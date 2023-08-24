<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('search', [HomeController::class, 'search'])->name('search');

Route::get('loginform', [AuthController::class, 'loginform'])->name('loginform');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('registerform', [AuthController::class, 'regisform'])->name('regisform');
Route::post('register', [AuthController::class, 'regis'])->name('register.submit');

Route::get('detail/{id}', [HomeController::class, 'detail'])->name('detail');

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('dashboard', [AdminController::class, 'showProduk'])->name('showProduk');

    Route::post('postkeranjang/{produk}', [TransaksiController::class, 'keranjang'])->name('keranjang');
    Route::get('keranjang', [TransaksiController::class, 'cart'])->name('pelanggan.keranjang');
    Route::delete('keranjang/{id}', [TransaksiController::class, 'hapusKeranjang'])->name('hapusKeranjang');

    Route::get('bayar/{detailtransaksi}', [TransaksiController::class, 'bayar'])->name('pelanggan.bayar');
    Route::post('prosesbayar/{detailtransaksi}', [TransaksiController::class, 'prosesBayar'])->name('pelanggan.prosesbayar');

    Route::get('summary', [TransaksiController::class, 'summary'])->name('pelanggan.summary');

    Route::get('tambah-Kategori', [AdminController::class, 'showAddKategori'])->name('showAddKategori');
    Route::post('add-Kategori', [AdminController::class, 'addKategori'])->name('addKategori');
    
    Route::get('tambah-produk', [AdminController::class, 'showAddProduk'])->name('showAddProduk');
    Route::post('add-produk', [AdminController::class, 'addProduk'])->name('addProduk');
    Route::delete('produk/{id}', [AdminController::class, 'destroy'])->name('produk.destroy');
    Route::get('produk/{id}/edit', [AdminController::class, 'edit'])->name('produk.edit');
    Route::put('produk/{id}', [AdminController::class, 'update'])->name('produk.update');
});

