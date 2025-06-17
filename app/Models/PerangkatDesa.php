<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerangkatDesa extends Model
{
    use HasFactory;

    protected $table = 'perangkat_desas'; // harus sama dengan nama tabel

    protected $fillable = [
        'nama', 'jabatan', 'kontak', 'foto'
    ];
}
