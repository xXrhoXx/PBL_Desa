<?php

namespace App\Http\Controllers;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;


class AuthController extends Controller
{
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $token = $request->cookie('token');
        
        if (!$token) {
            return redirect('/login')->with('error', 'Silakan login dahulu.');
        }

        try {
            $decoded = JWT::decode($token, new Key(env('JWT_SECRET'), 'HS256'));
            $payload = (array) $decoded; // konversi ke array

            // Kirim data ke view
            return view('dashboard', [
                'user' => $payload
            ]);

        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Token tidak valid atau sudah kadaluarsa.');
        }
    }
}

}
