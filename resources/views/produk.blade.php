@extends('layouts.app')

@section('title', 'Produk Desa')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Produk Unggulan Desa</h1>

    <div class="row">
        @forelse ($produk as $p)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow">
                <img src="{{ asset('storage/' . $p->gambar) }}" class="card-img-top" alt="{{ $p->nama_produk }}" style="max-width: 100%; height: 250px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $p->nama_produk }}</h5>
                    <p class="card-text">{{ $p->deskripsi }}</p>
                    <p class="text-success fw-bold">Rp {{ number_format($p->harga, 0, ',', '.') }}</p>
                </div>
                <div class="card-footer bg-white">
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $p->kontak) }}?text=Halo%2C%20saya%20tertarik%20dengan%20produk%20{{ urlencode($p->nama_produk) }}" 
                        target="_blank" 
                        class="btn btn-success w-100">
                        Hubungi via WhatsApp
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p class="text-center">Belum ada produk yang tersedia.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
