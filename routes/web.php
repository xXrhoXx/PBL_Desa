<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\CetakPDF_Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\ProdukController;


//cuy
Route::get('/admin/dashboard', function () {
    return view('home');
})->name('admin.dashboard');

Route::get('/admin/perangkat', [DesaController::class, 'perangkatIndex'])->name('admin.perangkat');
Route::post('/admin/perangkat', [DesaController::class, 'perangkatStore'])->name('perangkat.store');
Route::delete('/admin/perangkat/{id}', [DesaController::class, 'perangkatDestroy'])->name('perangkat.destroy');


Route::get('/admin/profil', [AdminController::class, 'profil'])->name('admin.profil');
Route::get('/admin/berita', [AdminController::class, 'berita'])->name('admin.berita');
Route::get('/admin/produk', [AdminController::class, 'produk'])->name('admin.produk');
Route::get('/admin/fb/edit/{id}', [ArtikelController::class, 'editFacebookPost'])->name('fb.edit');
Route::delete('/admin/fb/delete/{id}', [ArtikelController::class, 'deleteFacebookPost'])->name('fb.delete');
Route::post('/admin/fb/update/{postId}', [ArtikelController::class, 'updateFacebookPost'])->name('fb.update');


//Route::get('/admin/produk', [AdminController::class, 'produk'])->name('admin.produk');


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
Route::get('/artikel/edit/{id}', [ArtikelController::class, 'edit'])->name('artikel.edit');
Route::put('/artikel/{id}', [ArtikelController::class,'update'])->name('artikel.update');
Route::delete('/artikel/{id}', [ArtikelController::class, 'destroy'])->name('artikel.delete');


// Cetak PDF
Route::get('/cetak', [CetakPDF_Controller::class,'index'])->name('cetak.index');
Route::get('/cetak/SPKV', [CetakPDF_Controller::class,'SPKV_pdf'])->name('cetak.SPKV');
Route::get('/cetak/tes', [CetakPDF_Controller::class,'tes_pdf'])->name('cetak.tes');
Route::get('/cetak/SPKV/formSPKV', [CetakPDF_Controller::class,'formSPKV'])->name('form.SPKV');
Route::get('/form-cetak', [CetakPDF_Controller::class, 'showForm'])->name('form-cetak');
Route::post('/cetak-pdf', [CetakPDF_Controller::class, 'generatePdf'])->name('cetak-pdf');


Route::get('/facebook-posts', [ArtikelController::class, 'fetchFacebookPosts'])->name('facebook.posts');
Route::get('/fb/upload', [FacebookController::class, 'postPhoto']);
Route::get('/post-to-facebook', function () {
    $pageAccessToken = 'EAAQZB8ZBpM11ABO7KXUTQCwKf3DSehPK1KpcNaI2u6HQEQ0mBZAbrZBl5VWBdvY21zmHZAnZBZApUBtrQneHZB1eCJrzJZC2MGtqXLKCcXJdAif9FKUYpSg2W7wOZBG4RY3HOSpAbgxtoSe545DiLS2fnYEpuBnZAhabQviTD0etGwUZBHNW5E1MWQZAVlY9SrhrQYsn5jynAEOdv
';
    $pageId = '664056573459099';
    $imagePath = public_path('image.jpg');

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




    Route::get('/produk', [ProdukController::class, 'produkUser'])->name('produk.user');

});
