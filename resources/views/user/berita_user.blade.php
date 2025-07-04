@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">Berita Desa</h2>

    <!-- Form Pencarian -->
    <form method="GET" action="{{ route('berita') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari berita berdasarkan judul..." value="{{ request('search') }}">
            <button class="btn btn-success" type="submit">Cari</button>
        </div>
    </form>

    <!-- Grid Artikel -->
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse ($artikel as $item)
        <div class="col">
            <div class="card h-100 shadow-sm">
                @if ($item['gambar'])
                    <img src="{{ Str::startsWith($item['gambar'], 'http') ? $item['gambar'] : asset('storage/' . $item['gambar']) }}" class="card-img-top" style="height:200px; object-fit:cover;">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $item['judul'] }}</h5>
                    <p class="card-text">
                        <small>Oleh {{ $item['jurnalis'] }} - {{ $item['tanggal_terbit'] }}</small>
                    </p>
                    <p class="card-text">{{ \Illuminate\Support\Str::limit($item['deskripsi'], 100) }}</p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p class="text-center">Tidak ada artikel ditemukan.</p>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-4 d-flex justify-content-center">
        {{ $artikel->onEachSide(1)->links('pagination.custom') }}
    </div>
</div>
@endsection
