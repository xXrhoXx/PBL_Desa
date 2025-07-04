@extends('layouts.navbar_admn')

@section('content')
<div class="container">
    <h1 class="mb-4">Data Produk Desa</h1>

    {{-- Alert Success/Error --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Tombol Tambah Produk --}}
    <button class="btn btn-success mb-3" onclick="showTambahForm()">Tambah Produk</button>

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
            @foreach ($produk as $p)
            <tr>
<td>
    <img src="{{ asset('storage/' . $p->gambar) }}" alt="{{ $p->nama_produk }}" width="100">
</td>
<td>{{ $p->nama_produk }}</td>
<td>{{ $p->deskripsi }}</td>
<td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
<td>
    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $p->kontak) }}?text=Halo%20saya%20tertarik%20dengan%20produk%20{{ urlencode($p->nama_produk) }}" target="_blank" class="btn btn-success btn-sm">
    Hubungi
</a>

</td>
<td>
    <a href="#" class="btn btn-warning btn-sm"
       onclick="event.preventDefault(); editProduk(
           '{{ $p->id }}',
           `{{ $p->nama_produk }}`,
           `{{ $p->deskripsi }}`,
           '{{ $p->harga }}',
           '{{ $p->kontak }}'
       )">
        Edit
    </a>
    <form action="{{ route('produk.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm">Hapus</button>
    </form>
</td>

            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Form Tambah/Edit Produk --}}
    <div id="formProduk" class="card mt-4" style="display: none;">
        <div class="card-body">
            <h5 id="formTitle">Tambah Produk</h5>
            <form id="produkForm" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" id="formMethod" value="POST">
                <input type="hidden" name="id" id="produkId">

                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" name="gambar" id="gambarInput" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Nama Produk</label>
                    <input type="text" name="nama_produk" id="namaInput" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsiInput" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label>Harga</label>
                    <input type="number" name="harga" id="hargaInput" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Kontak</label>
                    <input type="text" name="kontak" id="kontakInput" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="button" class="btn btn-danger" onclick="resetForm()">Batal</button>
            </form>
        </div>
    </div>
</div>

<script>
function showTambahForm() {
    resetForm();
    document.getElementById('formProduk').style.display = 'block';
}

function editProduk(id, nama, deskripsi, harga, kontak) {
    document.getElementById('formTitle').innerText = 'Edit Produk';
    document.getElementById('produkId').value = id;
    document.getElementById('namaInput').value = nama;
    document.getElementById('deskripsiInput').value = deskripsi;
    document.getElementById('hargaInput').value = harga;
    document.getElementById('kontakInput').value = kontak;
    document.getElementById('produkForm').action = '/admin/produk/' + id;
    document.getElementById('formMethod').value = 'PUT';
    document.getElementById('formProduk').style.display = 'block';
}

function resetForm() {
    document.getElementById('formTitle').innerText = 'Tambah Produk';
    document.getElementById('produkForm').reset();
    document.getElementById('produkForm').action = '{{ route("produk.store") }}';
    document.getElementById('formMethod').value = 'POST';
    document.getElementById('formProduk').style.display = 'none';
}
</script>
@endsection
