<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class ArtikelController extends Controller
{
    public function index()
{
    $artikel = Artikel::all();
    return view('artikel.index', compact('artikel'));
}

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|min:3',
            'jurnalis' => 'required|min:3',
            'deskripsi' => 'required|min:3',
            'tanggal_terbit' => 'required|integer',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('gambar', 'public');
            $data['gambar'] = $gambar; 

        }

        $artikel = Artikel::create($data);
        \Log::info("PAGE_ID: " . config('services.facebook.page_id'));
        \Log::info("ACCESS_TOKEN: " . \Illuminate\Support\Str::limit(config('services.facebook.access_token'), 20));


        $this->postToFacebook($artikel);

        return redirect()->route('artikel.index')->with('success', 'Artikel Berhasil Ditambahkan');
    }

    public function edit($id)
{
    $artikelDetail = Artikel::findOrFail($id);
    $artikel = Artikel::all();

    return view('artikel.index', compact('artikel', 'artikelDetail'));
}

    public function update(Request $request, $id)
{
    $artikel = Artikel::findOrFail($id);

    $data = $request->validate([
        'judul' => 'required|min:3',
        'jurnalis' => 'required|min:3',
        'deskripsi' => 'required|min:3',
        'tanggal_terbit' => 'required|integer',
        'gambar' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('gambar')) {
        // Hapus gambar lama kalau ada
        if ($artikel->gambar && file_exists(public_path('storage/' . $artikel->gambar))) {
            unlink(public_path('storage/' . $artikel->gambar));
        }

        $gambar = $request->file('gambar')->store('gambar', 'public');
        $data['gambar'] = $gambar; // BENAR! simpan "gambar/namafile.jpg"

    }

    $artikel->update($data);

    return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diperbarui');
}


   private function postToFacebook($artikel)
{
    $pageAccessToken = config('services.facebook.access_token');
    $pageId = config('services.facebook.page_id');

    if (!$pageAccessToken || !$pageId || $pageId == '0') {
        \Log::error("FB_PAGE_ID atau FB_PAGE_ACCESS_TOKEN belum terbaca");
        return;
    }

    $gambarPath = public_path('storage/' . $artikel->gambar);
    if (!$artikel->gambar || !file_exists($gambarPath)) {
        \Log::error("Gambar tidak ditemukan di path: " . $gambarPath);
        return;
    }

    $photo = new \CURLFile($gambarPath, mime_content_type($gambarPath), basename($gambarPath));

    $data = [
        'access_token' => $pageAccessToken,
        'source' => $photo,
        'caption' => $artikel->judul . "\n\n" . $artikel->deskripsi,
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/{$pageId}/photos");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if(curl_errno($ch)) {
        \Log::error('Facebook Post Error: ' . curl_error($ch));
    } else {
        \Log::info('Facebook Post Response: ' . $response);
    }

    curl_close($ch);
}

}
