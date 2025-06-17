<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    // Tampilkan semua produk
    public function index()
    {
        return Produk::all();
    }

    // Tambah produk baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'deskripsi'   => 'required',
            'harga'       => 'required|integer',
            'kontak'      => 'required',
            'gambar'      => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload gambar
        $path = $request->file('gambar')->store('produk', 'public');

        // Simpan data produk
        $produk = Produk::create([
            'nama_produk' => $request->nama_produk,
            'deskripsi'   => $request->deskripsi,
            'harga'       => $request->harga,
            'kontak'      => $request->kontak,
            'gambar'      => $path,
        ]);

        return response()->json($produk, 201);
    }

    // Tampilkan detail produk
    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return response()->json($produk);
    }

    // Update produk
    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required',
            'deskripsi'   => 'required',
            'harga'       => 'required|integer',
            'kontak'      => 'required',
            'gambar'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Update data
        $produk->nama_produk = $request->nama_produk;
        $produk->deskripsi   = $request->deskripsi;
        $produk->harga       = $request->harga;
        $produk->kontak      = $request->kontak;

        // Kalau gambar baru dikirim
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('produk', 'public');
            $produk->gambar = $path;
        }

        $produk->save();

        return response()->json($produk);
    }
    // Hapus produk
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        Storage::disk('public')->delete($produk->gambar);
        $produk->delete();

        return response()->json(['message' => 'Produk berhasil dihapus']);
    }

    public function produkAdmin()
    {
        $produk = Produk::latest()->get();
        return view('admin.produk');
    }

}
