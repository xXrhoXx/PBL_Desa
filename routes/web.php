<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\CetakPDF_Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

// view frondtend
Route::get('/admin/dashboard', function () {
    return view('home');
})->name('admin.dashboard');


Route::get('/admin/profil', [AdminController::class, 'profil'])->name('admin.profil');
Route::get('/admin/berita', [AdminController::class, 'berita'])->name('admin.berita');
Route::get('/admin/perangkat', [AdminController::class, 'perangkat'])->name('admin.perangkat');
Route::get('/admin/produk', [AdminController::class, 'produk'])->name('admin.produk');


Route::get('/', [DesaController::class, 'home'])->name('home');
Route::get('/berita', [DesaController::class, 'berita'])->name('berita');
Route::get('/kontak', [DesaController::class, 'kontak'])->name('kontak');
Route::get('/produk', [DesaController::class, 'produk'])->name('produk');
Route::get('/informasi', [DesaController::class, 'informasi'])->name('informasi');


Route::get('/login', [DesaController::class, 'showLoginForm'])->name('login');
Route::post('/login', [DesaController::class, 'login']);
Route::post('/logout', [DesaController::class, 'logout'])->name('logout');


// CRUD artikel
Route::get('/artikel', [ArtikelController::class,'index'])->name('artikel.index');
Route::post('/artikel', [ArtikelController::class,'store'])->name('artikel.store');
Route::get('/artikel/{id}/edit', [ArtikelController::class,'edit'])->name('artikel.edit');
Route::put('/artikel/{id}/update', [ArtikelController::class,'update'])->name('artikel.update');
Route::delete('/artikel/{id}/delete', [ArtikelController::class,'destroy'])->name('artikel.delete');

// Cetak PDF
Route::get('/cetak', [CetakPDF_Controller::class,'index'])->name('cetak.index');
Route::get('/cetak/SPKV', [CetakPDF_Controller::class,'SPKV_pdf'])->name('cetak.SPKV');
Route::get('/cetak/tes', [CetakPDF_Controller::class,'tes_pdf'])->name('cetak.tes');
