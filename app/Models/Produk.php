<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk'; // tambahkan ini!
    protected $fillable = ['nama_produk', 'deskripsi', 'harga', 'kontak', 'gambar'];
}


