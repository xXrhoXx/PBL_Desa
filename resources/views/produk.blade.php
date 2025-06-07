@extends('layouts.app')

@section('title', 'Produk Desa')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Produk Unggulan Desa</h1>
    
    <div class="row">
        @for($i = 1; $i <= 6; $i++)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Produk {{ $i }}">
                <div class="card-body">
                    <h5 class="card-title">Produk Desa {{ $i }}</h5>
                    <p class="card-text">Deskripsi produk {{ $i }}. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <p class="text-success fw-bold">Rp {{ number_format(rand(10000, 100000), 0, ',', '.') }}</p>
                </div>
                <div class="card-footer bg-white">
                    <button class="btn btn-success w-100">Pesan Sekarang</button>
                </div>
            </div>
        </div>
        @endfor
    </div>
</div>
@endsection