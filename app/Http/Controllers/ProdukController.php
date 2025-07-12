<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    // Tampilkan semua produk (API)
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
        Produk::create([
            'nama_produk' => $request->nama_produk,
            'deskripsi'   => $request->deskripsi,
            'harga'       => $request->harga,
            'kontak'      => $request->kontak,
            'gambar'      => $path,
        ]);

        return redirect()->route('admin.produk')->with('success', 'Produk berhasil ditambahkan');
    }

    // Tampilkan detail produk (API)
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

        if ($request->hasFile('gambar')) {
            if ($produk->gambar && Storage::disk('public')->exists($produk->gambar)) {
                Storage::disk('public')->delete($produk->gambar);
            }
            $path = $request->file('gambar')->store('produk', 'public');
            $produk->gambar = $path;
        }

        $produk->save();

        return redirect()->route('admin.produk')->with('success', 'Produk berhasil diupdate');
    }

    // Hapus produk
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        if ($produk->gambar && Storage::disk('public')->exists($produk->gambar)) {
            Storage::disk('public')->delete($produk->gambar);
        }
        $produk->delete();

        return redirect()->route('admin.produk')->with('success', 'Produk berhasil dihapus');
    }

    // Tampilkan ke halaman admin
public function produkAdmin()
{
    $produk = Produk::all();
    return view('admin.produk', compact('produk'));
}

public function produkUser()
{
    $produk = Produk::all(); // ambil semua produk dari database
    return view('produk', compact('produk')); // sesuaikan dengan nama view
}

}
