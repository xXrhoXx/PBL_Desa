<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

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
            'gambar' => 'nullable|image|max:2048', // opsional
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('gambar', 'public');
            $data['gambar'] = basename($gambar);
        }

        Artikel::create($data);
        return redirect()->route('artikel.index')->with('success', 'Artikel Berhasil Ditambahkan');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $artikel = Artikel::all();
        $artikelDetail = Artikel::findOrFail($id);
        return view('artikel.index', compact('artikel', 'artikelDetail'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'judul' => 'required',
            'jurnalis' => 'required',
            'deskripsi' => 'required',
            'tanggal_terbit' => 'required|integer',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $artikel = Artikel::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('gambar', 'public');
            $data['gambar'] = basename($gambar);
        }

        $artikel->update($data);

        return redirect()->route('artikel.index')->with('success', 'Artikel Berhasil Diperbarui');
    }

    public function destroy(string $id)
    {
        $artikelDetail = Artikel::findOrFail($id);
        $artikelDetail->delete();
        return redirect()->route('artikel.index')->with('success', 'Artikel Berhasil Dihapus');
    }
}
