<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Access the cookie directly from the raw header
        $cookieHeader = $request->header('Cookie');

        if (!$cookieHeader) {
            return response()->json(['message' => 'Unauthorized: No cookies found'], 401);
        }

        // Parse cookie manually (document.cookie doesn't set HttpOnly so it shows up here)
        $cookies = $this->parseCookies($cookieHeader);

        if (!isset($cookies['token'])) {
            return response()->json(['message' => 'Unauthorized: No token found in cookie'], 401);
        }

        $token = $cookies['token'];

        // Call your API with the token
        $response = Http::get('http://127.0.0.1:8000/api/is_admin', [
            'token' => $token,
        ]);

        if ($response->failed()) {
            return response()->json(['message' => 'Unauthorized: Invalid token'], 401);
        }

        $isAdmin = $response->json();

        if (!$isAdmin) {
            return response()->json(['message' => 'Access denied: Admins only'], 403);
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
