<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesaController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function berita()
    {
    return view('user.berita');
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

        if (Desa::attempt($credentials)) {
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
        Desa::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}