@extends('layouts.navbar_admn')

@section('content')
<div class="container mt-3">
    <h1 class="text-center">Daftar Artikel</h1>

    {{-- Notifikasi Sukses --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label="Close"></button>
        </div>
    @endif

    {{-- Error Validation --}}
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Tabel Artikel --}}
    <div class="table-responsive mt-4">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Jurnalis</th>
                    <th>Deskripsi</th>
                    <th>Tahun Terbit</th>
                    <th>Gambar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($artikel as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->jurnalis }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>{{ $item->tanggal_terbit }}</td>
                        <td>
                            @if ($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" width="100" alt="Gambar">
                            @else
                                <img src="{{ asset('images/default.jpg') }}" width="100" alt="Default">
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Form Tambah/Edit Artikel --}}
    <div class="mt-4 p-3 bg-light rounded">
        <h3>{{ isset($artikelDetail) ? 'Edit Artikel' : 'Tambah Artikel' }}</h3>
        <form action="{{ isset($artikelDetail) ? route('artikel.update', $artikelDetail->id) : route('artikel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($artikelDetail))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label for="judul" class="form-label">Judul Artikel</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $artikelDetail->judul ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label for="jurnalis" class="form-label">Jurnalis</label>
                <input type="text" class="form-control" id="jurnalis" name="jurnalis" value="{{ old('jurnalis', $artikelDetail->jurnalis ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ old('deskripsi', $artikelDetail->deskripsi ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_terbit" class="form-label">Tahun Terbit</label>
                <input type="number" class="form-control" id="tanggal_terbit" name="tanggal_terbit" min="1900" max="2099" value="{{ old('tanggal_terbit', $artikelDetail->tanggal_terbit ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar Artikel</label>
                <input type="file" class="form-control" id="gambar" name="gambar" {{ isset($artikelDetail) ? '' : 'required' }}>
                @if(isset($artikelDetail) && $artikelDetail->gambar)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $artikelDetail->gambar) }}" width="120" alt="Gambar Artikel">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
