@extends('layouts.navbar_admn')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Profil Admin</h2>

    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-body">
            <h5 class="card-title">Nama: Admin Desa</h5>
            <p class="card-text">Email: admin@desa.com</p>
            <p class="card-text">Jabatan: Administrator Sistem</p>
            <p class="card-text">Tanggal Login Terakhir: {{ now()->format('d M Y, H:i') }}</p>

            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="btn btn-danger">
               Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</div>
@endsection
