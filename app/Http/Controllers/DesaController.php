<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\PerangkatDesa; 

class DesaController extends Controller
{
    public function home()
    {
    return view('home'); // Ganti 'home' dengan nama view yang kamu pakai
    }
    
    public function berita(Request $request)
    {
    $query = Artikel::query();

    if ($request->has('search')) {
        $query->where('judul', 'like', '%' . $request->search . '%');
    }

    $artikel = $query->latest()->take(6)->get(); // tampilkan 6 artikel terbaru

    return view('user.berita_user', compact('artikel'));
    }

    public function produk()
    {
        // Anda bisa menambahkan logika untuk mengambil data produk dari database di sini
        return view('produk');
    }

    public function informasi()
    {
        return view('informasi');
    }

    // Tampilkan form login
    public function showLoginForm()
    {
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home'); // arahkan ke dashboard atau halaman utama
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // Logout
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


// Tampilkan semua perangkat desa
public function perangkatIndex()
{
    $perangkat = PerangkatDesa::all();
    return view('admin.perangkat', compact('perangkat'));
}

// Simpan perangkat desa baru
public function perangkatStore(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'jabatan' => 'required',
        'kontak' => 'required',
        'foto' => 'required|image|max:2048',
    ]);

    $fotoPath = $request->file('foto')->store('perangkat', 'public');

    PerangkatDesa::create([
        'nama' => $request->nama,
        'jabatan' => $request->jabatan,
        'kontak' => $request->kontak,
        'foto' => $fotoPath,
    ]);

    return redirect()->back()->with('success', 'Perangkat berhasil ditambahkan');
}


// Hapus perangkat desa
public function perangkatDestroy($id)
{
    $perangkat = PerangkatDesa::findOrFail($id);

    // Hapus file foto dari storage (opsional)
    if ($perangkat->foto && \Storage::disk('public')->exists($perangkat->foto)) {
        \Storage::disk('public')->delete($perangkat->foto);
    }

    $perangkat->delete();

    return redirect()->back()->with('success', 'Perangkat berhasil dihapus');
}

}
