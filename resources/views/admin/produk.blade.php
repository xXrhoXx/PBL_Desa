@extends('layouts.navbar_admn')

@section('content')
<div class="container">
    <h1 class="mb-4">Data Produk Desa</h1>

    {{-- Tombol Tambah Produk --}}
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#tambahProdukModal">
        Tambah Produk
    </button>

    {{-- Tabel Produk --}}
    <table class="table table-bordered table-hover align-middle">
        <thead class="table-success">
            <tr>
                <th>Gambar</th>
                <th>Nama Produk</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Kontak</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <img src="{{ asset('storage/produk/kopi.jpg') }}" alt="Kopi Robusta" width="100">
                </td>
                <td>Kopi Robusta</td>
                <td>Biji kopi asli hasil panen warga</td>
                <td>Rp 45.000</td>
                <td>082345678901</td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                    <form action="#" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="{{ asset('storage/produk/kerajinan.jpg') }}" alt="Kerajinan Bambu" width="100">
                </td>
                <td>Kerajinan Bambu</td>
                <td>Keranjang anyaman dari bambu lokal</td>
                <td>Rp 75.000</td>
                <td>081234567890</td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                    <form action="#" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
