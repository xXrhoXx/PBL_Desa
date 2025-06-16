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


Route::get('/facebook-posts', [ArtikelController::class, 'fetchFacebookPosts'])->name('facebook.posts');
Route::get('/fb/upload', [FacebookController::class, 'postPhoto']);
Route::get('/post-to-facebook', function () {
    $pageAccessToken = 'EAAQZB8ZBpM11ABO7KXUTQCwKf3DSehPK1KpcNaI2u6HQEQ0mBZAbrZBl5VWBdvY21zmHZAnZBZApUBtrQneHZB1eCJrzJZC2MGtqXLKCcXJdAif9FKUYpSg2W7wOZBG4RY3HOSpAbgxtoSe545DiLS2fnYEpuBnZAhabQviTD0etGwUZBHNW5E1MWQZAVlY9SrhrQYsn5jynAEOdv
';  // Ganti tokenmu
    $pageId = '664056573459099';
    $imagePath = public_path('image.jpg'); // letakkan image.jpg di folder /public

    if (!file_exists($imagePath)) {
        return "File tidak ditemukan: $imagePath";
    }

    $photo = new CURLFile($imagePath, mime_content_type($imagePath), basename($imagePath));
    $data = [
        'access_token' => $pageAccessToken,
        'source' => $photo,
        'caption' => 'Upload dari Laravel',
        'published' => 'true'
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/$pageId/photos");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);

    return $err ? "cURL Error: $err" : "Response: $response";
});