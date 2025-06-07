<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artikel =
            [
                [
                    'judul' => 'Sensus Penduduk 2025',
                    'jurnalis' => 'Nengah Jelantik',
                    'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, animi.',
                    'tanggal_terbit' => '2025',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'judul' => 'Sekolah Sepak Bola',
                    'jurnalis' => 'Pemdes',
                    'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, animi.',
                    'tanggal_terbit' => '2024',
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ];
            DB::table('artikel')->insert($artikel);
    }
}
