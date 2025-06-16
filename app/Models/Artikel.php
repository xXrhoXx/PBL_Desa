<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';
    protected $fillable = ['judul', 'jurnalis', 'deskripsi', 'tanggal_terbit','gambar'];
}
