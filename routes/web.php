<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DesaController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\CetakPDF_Controller;
use App\Http\Controllers\PerangkatDesaApiController;

//cuy
Route::get('/admin/dashboard', function () {
    return view('home');
})->name('admin.dashboard');

Route::get('/admin/perangkat', [DesaController::class, 'perangkatIndex'])->name('admin.perangkat')->middleware(AdminMiddleware::class);
Route::post('/admin/perangkat', [DesaController::class, 'perangkatStore'])->name('perangkat.store')->middleware(AdminMiddleware::class);
Route::delete('/admin/perangkat/{id}', [DesaController::class, 'perangkatDestroy'])->name('perangkat.destroy')->middleware(AdminMiddleware::class);
Route::put('/admin/perangkat/{id}', [DesaController::class, 'perangkatUpdate'])->name('perangkat.update')->middleware(AdminMiddleware::class);

// Route::get('/produk', [ProdukController::class, 'produkUser'])->name('produk');
Route::get('/produk-admin', [DesaController::class, 'produk'])->name('produk.admin')->middleware(AdminMiddleware::class);
Route::post('/admin/produk', [ProdukController::class, 'store'])->name('produk.store')->middleware(AdminMiddleware::class);
Route::put('/admin/produk/{id}', [ProdukController::class, 'update'])->name('produk.update')->middleware(AdminMiddleware::class);
Route::delete('/admin/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy')->middleware(AdminMiddleware::class);
Route::get('/admin/produk', [ProdukController::class, 'produkAdmin'])->name('admin.produk')->middleware(AdminMiddleware::class);




Route::get('/admin/profil', [AdminController::class, 'profil'])->name('admin.profil')->middleware(AdminMiddleware::class);
Route::get('/admin/berita', [AdminController::class, 'berita'])->name('admin.berita')->middleware(AdminMiddleware::class);
Route::get('/admin/fb/edit/{id}', [ArtikelController::class, 'editFacebookPost'])->name('fb.edit')->middleware(AdminMiddleware::class);
Route::delete('/admin/fb/delete/{id}', [ArtikelController::class, 'deleteFacebookPost'])->name('fb.delete')->middleware(AdminMiddleware::class);
Route::post('/admin/fb/update/{postId}', [ArtikelController::class, 'updateFacebookPost'])->name('fb.update')->middleware(AdminMiddleware::class);


//Route::get('/admin/produk', [AdminController::class, 'produk'])->name('admin.produk');


Route::get('/', [DesaController::class, 'home'])->name('home');
Route::get('/berita', [DesaController::class, 'berita'])->name('berita');
Route::get('/kontak', [DesaController::class, 'kontak'])->name('kontak');
Route::get('/produk', [DesaController::class, 'produk'])->name('produk');
Route::get('/informasi', [DesaController::class, 'informasi'])->name('informasi');






//real login
Route::get('/login', [DesaController::class, 'Login'])->name('login');
// logout
Route::post('/logout', function () {
    return redirect()->route('home')
        ->withCookie(cookie()->forget('token'))
        ->withCookie(cookie()->forget('role'));
})->name('logout');



// CRUD artikel
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::post('/artikel', [ArtikelController::class, 'store'])->name('artikel.store');
Route::get('/artikel/edit/{id}', [ArtikelController::class, 'edit'])->name('artikel.edit');
Route::put('/artikel/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
Route::delete('/artikel/{id}', [ArtikelController::class, 'destroy'])->name('artikel.delete');


// Cetak PDF halaman awal
Route::get('/cetak', [CetakPDF_Controller::class, 'index'])->name('cetak.index')->middleware(UserMiddleware::class);
// halaman file pdfnya
Route::get('/cetak/SPKV', [CetakPDF_Controller::class, 'SPKV_pdf'])->name('cetak.SPKV')->middleware(UserMiddleware::class);
Route::get('/cetak/surat_tidak_mampu', [CetakPDF_Controller::class, 'surat_tidak_mampu_pdf'])->name('cetak.ketTidakMampu')->middleware(UserMiddleware::class);
Route::get('/cetak/surat_belum_menikah', [CetakPDF_Controller::class, 'surat_belum_menikah_pdf'])->name('cetak.ketBelumMenikah')->middleware(UserMiddleware::class);
Route::get('/cetak/surat_hilang_kk', [CetakPDF_Controller::class, 'surat_hilang_kk_pdf'])->name('cetak.ketHilangKK')->middleware(UserMiddleware::class);
Route::get('/cetak/surat_domisili_baru', [CetakPDF_Controller::class, 'surat_domisili_baru'])->name('cetak.ketDomisiliBaru')->middleware(UserMiddleware::class);
// halaman form isi data pdf
Route::get('/cetak/formSPKV', [CetakPDF_Controller::class, 'formSPKV'])->name('form.SPKV')->middleware(UserMiddleware::class);
Route::get('/cetak/formKetTidakMampu', [CetakPDF_Controller::class, 'formKet_tidak_mampu'])->name('form.ketTidakMampu')->middleware(UserMiddleware::class);
Route::get('/cetak/formKetBelumMenikah', [CetakPDF_Controller::class, 'formKet_belum_menikah'])->name('form.ketBelumMenikah')->middleware(UserMiddleware::class);
Route::get('/cetak/formKetHilangKK', [CetakPDF_Controller::class, 'formKet_hilang_kk'])->name('form.ketHilangKK')->middleware(UserMiddleware::class);
Route::get('/cetak/formKetDomisiliBaru', [CetakPDF_Controller::class, 'formKet_domisili_baru'])->name('form.ketDominisiBaru')->middleware(UserMiddleware::class);
// pengisian form
Route::post('/cetakSPKV-pdf', [CetakPDF_Controller::class, 'generateSPKV_Pdf'])->name('cetakSPKV-pdf')->middleware(UserMiddleware::class);
Route::post('/cetakSKTM-pdf', [CetakPDF_Controller::class, 'generateSKTM_Pdf'])->name('cetakSKTMpdf')->middleware(UserMiddleware::class);
Route::post('/cetakSKBM-pdf', [CetakPDF_Controller::class, 'generateSKBM_Pdf'])->name('cetakSKBMpdf')->middleware(UserMiddleware::class);
Route::post('/cetakSKHKK-pdf', [CetakPDF_Controller::class, 'generateSKHKK_Pdf'])->name('cetakSKHKKpdf')->middleware(UserMiddleware::class);
Route::post('/cetakSKDB-pdf', [CetakPDF_Controller::class, 'generateSuratDomisili_Pdf'])->name('cetakSKDBpdf')->middleware(UserMiddleware::class);

// facebook
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



// perangkat desa API
Route::view('/form-perangkat', 'perangkat.form');
Route::post('/cek-perangkat-desa', [PerangkatDesaApiController::class, 'getPerangkatDesa'])->name('cek.perangkat');