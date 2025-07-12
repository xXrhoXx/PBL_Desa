<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PerangkatDesaApiController extends Controller
{
public function getPerangkatDesa(Request $request)
{
    $validated = $request->validate([
        'nama'    => 'required|string|max:255',
        'jabatan' => 'required|string|max:255',
        'kontak'  => 'required|string|max:50',
        'foto'    => 'required|image|max:2048',
    ]);

    $token = $request->bearer_token ?? $request->header('Authorization');
    if (!$token) {
        return back()->with('error', 'Token tidak ditemukan.');
    }

    // Encode gambar sebagai blob (base64)
    $fotoBlob = base64_encode(file_get_contents($request->file('foto')->getRealPath()));

    $formData = [
        'nama'    => $validated['nama'],
        'jabatan' => $validated['jabatan'],
        'kontak'  => $validated['kontak'],
        'foto'    => $fotoBlob,
    ];

    // Kirim request GET dengan body (simulasi jika backend menerima body di GET)
    $response = \Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept'        => 'application/json',
        ])
        ->withBody(http_build_query($formData), 'application/x-www-form-urlencoded')
        ->get('http://127.0.0.1:8000/api/perangkat-desa');

    if ($response->successful()) {
        $data = $response->json();

        // Kirim ke view
        return view('perangkat.index', ['perangkat' => $data]);
    }

    return back()->with('error', 'Gagal mengambil data dari API.');
}


    
}
