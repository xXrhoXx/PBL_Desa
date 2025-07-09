<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ambil cookie dari header
        $cookieHeader = $request->header('Cookie');

        if (!$cookieHeader) {
            return redirect('/login')->with('error', 'Unauthorized: No cookies found');
        }

        // Parse cookie manual
        $cookies = $this->parseCookies($cookieHeader);

        if (!isset($cookies['token'])) {
            return redirect('/login')->with('error', 'Unauthorized: No token found in cookie');
        }

        $token = $cookies['token'];

        // Panggil API untuk cek apakah admin
        $response = Http::get('http://127.0.0.1:8000/api/is_admin', [
            'token' => $token,
        ]);

        if ($response->failed()) {
            return redirect('/login')->with('error', 'Unauthorized: Invalid token');
        }

        $isAdmin = $response->json();

        if ($isAdmin) {
            return redirect('/login')->with('error', 'Access denied: User only');
        }

        return $next($request);
    }

    private function parseCookies(string $cookieHeader): array
    {
        $cookies = [];
        $pairs = explode(';', $cookieHeader);

        foreach ($pairs as $pair) {
            [$key, $value] = explode('=', $pair, 2);
            $cookies[trim($key)] = urldecode($value);
        }

        return $cookies;
    }
}
