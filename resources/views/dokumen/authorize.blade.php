@php
    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;

    $token = request()->cookie('token');
    $isAuthorized = false;

    try {
        if ($token) {
            $decoded = JWT::decode($token, new Key(env('nik', 'your_secret_key'), 'HS256'));

            $allowedRoles = collect($roles ?? [])->map(fn($r) => strtolower($r))->toArray();

            if (in_array(strtolower($decoded->role ?? ''), $allowedRoles)) {
                $isAuthorized = true;
            }
        }
    } catch (\Exception $e) {
        $isAuthorized = false;
    }
@endphp

@if ($isAuthorized)
    {{ $slot }}
@endif
