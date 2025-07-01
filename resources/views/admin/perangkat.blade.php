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
        <a href="#" class="btn btn-warning btn-sm"
   onclick="editPerangkat('{{ $p->id }}', '{{ $p->nama }}', '{{ $p->jabatan }}', '{{ $p->kontak }}')">
   Edit
</a>

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

   <!-- Tambah/Edit Form Perangkat -->
<div id="formTambah" class="card mt-4" style="display: none;">
    <div class="card-body">
        <h5 id="formTitle" class="card-title">Tambah Data Perangkat Desa</h5>
        <form id="formPerangkat" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" id="formMethod">
            <input type="hidden" name="id" id="perangkatId">

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" name="foto" class="form-control" id="fotoInput">
                </div>
                <div class="col-md-4">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" id="namaInput" required>
                </div>
                <div class="col-md-4">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" id="jabatanInput" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="kontak" class="form-label">Kontak</label>
                <input type="text" name="kontak" class="form-control" id="kontakInput" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-secondary" onclick="resetForm()">Batal</button>
        </form>
    </div>
</div>


<script>
function editPerangkat(id, nama, jabatan, kontak) {
    const form = document.getElementById('formPerangkat');
    document.getElementById('formTitle').innerText = 'Edit Data Perangkat';

    document.getElementById('namaInput').value = nama;
    document.getElementById('jabatanInput').value = jabatan;
    document.getElementById('kontakInput').value = kontak;

    form.action = `/admin/perangkat/${id}`;
    
    // pastikan input hidden _method punya nilai 'PUT'
    document.getElementById('formMethod').value = 'PUT';

    document.getElementById('formTambah').style.display = 'block';
}
function resetForm() {
    document.getElementById('formTitle').innerText = 'Tambah Data Perangkat Desa';
    document.getElementById('namaInput').value = '';
    document.getElementById('jabatanInput').value = '';
    document.getElementById('kontakInput').value = '';

    const form = document.getElementById('formPerangkat');
    form.action = `{{ route('perangkat.store') }}`;
    document.getElementById('formMethod').value = ''; // kosongkan supaya tetap POST
    document.getElementById('fotoInput').value = '';
    
    document.getElementById('formTambah').style.display = 'none';
}

</script>
@endsection
