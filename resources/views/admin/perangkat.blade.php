@extends('layouts.navbar_admn')

@section('content')
<div class="container">
    <h1 class="mb-4">Data Perangkat Desa</h1>

    {{-- Tombol Tambah --}}
    <button class="btn btn-success mb-3" onclick="toggleForm()">
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
@foreach ($perangkat as $p)
<tr>
    <td class="text-center">
        <img src="{{ asset('storage/' . $p->foto) }}" alt="{{ $p->nama }}" width="80" class="rounded">
    </td>
    <td>{{ $p->nama }}</td>
    <td>{{ $p->jabatan }}</td>
    <td>{{ $p->kontak }}</td>
    <td class="text-center">
        <a href="#" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('perangkat.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">Hapus</button>
        </form>
    </td>
</tr>
@endforeach

        </tbody>
    </table>

    <!-- Tambah Form Perangkat (sembunyi dulu) -->
    <div id="formTambah" class="card mt-4" style="display: none;">
        <div class="card-body">
            <h5 class="card-title">Tambah Data Perangkat Desa</h5>
            <form action="{{ route('perangkat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" name="foto" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="kontak" class="form-label">Kontak</label>
                    <input type="text" name="kontak" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary" onclick="toggleForm()">Batal</button>
            </form>
        </div>
    </div>
</div>

<script>
    function toggleForm() {
        const form = document.getElementById('formTambah');
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
</script>
@endsection
