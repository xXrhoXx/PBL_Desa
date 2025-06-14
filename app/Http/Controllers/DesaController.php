<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;

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
}
