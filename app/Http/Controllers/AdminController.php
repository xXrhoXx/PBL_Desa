<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel; // pastikan ada import model Artikel

class AdminController extends Controller
{
    public function profil()
    {
        return view('admin.profil'); // Buat file resources/views/admin/profil.blade.php
    }



    public function berita()
    {
        $artikel = Artikel::all(); // Ambil semua data artikel dari DB
        return view('admin.berita', compact('artikel'));
    }


    public function produk()
    {
        return view('admin.produk'); // Buat file resources/views/admin/produk.blade.php
    }
}
