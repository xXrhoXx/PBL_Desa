<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artikel = Artikel::all();
        return view('artikel.index', compact('artikel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|min:3',
            'jurnalis' => 'required|min:3',
            'deskripsi' => 'required|min:3',
            'tanggal_terbit' => 'required'
        ]);
        Artikel::create($validated);
        return redirect()->route('artikel.index')->with('success', 'Artikel Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $artikel = Artikel::all();
        $artikelDetail = Artikel::findOrFail($id);
        return view('artikel.index', compact('artikel', 'artikelDetail'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'judul' => 'required|min:3',
            'jurnalis' => 'required|min:3',
            'deskripsi' => 'required|min:3',
            'tanggal_terbit' => 'required'
        ]);
        Artikel::where('id', $id)->update($validated);
        return redirect()->route('artikel.index')->with('success', 'Artikel Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $artikelDetail = Artikel::findOrFail($id);
        $artikelDetail->delete();
        return redirect()->route('artikel.index')->with('success', 'Artikel Berhasil Dihapus');
    }
}
