@extends('layouts.app')

@section('title', 'Berita Desa')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Berita Desa</h1>
    <!-- Konten berita di sini -->
</div>

    <div class="row gx-4 gy-4">
        @for($i = 1; $i <= 6; $i++)
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <img src="https://via.placeholder.com/600x300?text=Berita+{{ $i }}" class="card-img-top" alt="Berita {{ $i }}">
                <div class="card-body">
                    <small class="text-muted">{{ date('d M Y') }}</small>
                    <h4 class="card-title mt-2">Judul Berita {{ $i }}</h4>
                    <p class="card-text text-secondary">Deskripsi singkat berita {{ $i }}. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <a href="#" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
        @endfor
    </div>

    <nav aria-label="Page navigation" class="mt-5">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
</div>
@endsection
