@extends('layouts.navbar_admn')

@section('content')
<div class="container">
    <h1 class="mb-4">Data Perangkat Desa</h1>

    {{-- Tombol Tambah --}}
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">
        Tambah Perangkat Desa
    </button>

    <!-- Tabel Perangkat -->
    <table class="table table-bordered align-middle">
        <thead class="table-success text-center">
            <tr>
                <th>Foto</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Kontak</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">
                    <img src="{{ asset('storage/perangkat/kepala_desa.jpg') }}" alt="Kepala Desa" width="80" class="rounded">
                </td>
                <td>Made Sugiarta</td>
                <td>Kepala Desa</td>
                <td>08123456789</td>
                <td class="text-center">
                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                    <form action="#" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            <tr>
                <td class="text-center">
                    <img src="{{ asset('storage/perangkat/sekretaris_desa.jpg') }}" alt="Sekretaris Desa" width="80" class="rounded">
                </td>
                <td>Ni Luh Ayu</td>
                <td>Sekretaris Desa</td>
                <td>08234567890</td>
                <td class="text-center">
                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                    <form action="#" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            <tr>
                <td class="text-center">
                    <img src="{{ asset('storage/perangkat/bendahara.jpg') }}" alt="Bendahara" width="80" class="rounded">
                </td>
                <td>Wayan Surya</td>
                <td>Bendahara</td>
                <td>08345678901</td>
                <td class="text-center">
                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                    <form action="#" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
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
