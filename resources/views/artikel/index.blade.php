    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Artikel</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome untuk ikon -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style>
            .action-buttons {
                white-space: nowrap;
            }
            .action-buttons a {
                color:#000;
                text-decoration:none;
            }

            .table-responsive {
                margin-top: 20px;
            }
            h1 {
                color: #333;
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

        <div class="container mt-5">
            <h1 class="text-center">Daftar Artikel</h1>
            @if (session('success'))
                <div class="alert alert-success alert-dimissable fade-show" role="alert">
                    {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $item)
                            <li>{{$item}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Tabel Data Artikel -->
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Jurnalis</th>
                            <th>Deskripsi</th>
                            <th>Tahun Terbit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($artikel as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->judul}}</td>
                            <td>{{$item->jurnalis}}</td>
                            <td>{{$item->deskripsi}}</td>
                            <td>{{$item->tanggal_terbit}}</td>
                            <td class="action-buttons">
                                <button class="btn btn-sm btn-warning">
                                    <a href="{{ route('artikel.edit', ['id'=>$item->id]) }}">
                                    <i class="fas fa-edit"></i> Edit
                                    </a>
                                </button>
                                <form action="{{ route('artikel.delete', ['id'=>$item->id]) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Form Tambah Data (opsional) -->
            <div class="mt-4 p-3 bg-light rounded">
                <h3>{{isset($artikelDetail)?'Edit Artikel':'Tambah Artikel' }}</h3>
                <form action="{{ isset($artikelDetail)? route('artikel.update',['id'=>$artikelDetail->id]): route('artikel.store') }}" method="post">
                    @csrf
                    @if (isset($artikelDetail))
                        @method('put')
                    @endif
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Arikel</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $artikelDetail->judul??'') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="jurnalis" class="form-label">Jurnalis</label>
                        <input type="text" class="form-control" id="jurnalis" name="jurnalis" value="{{ old('jurnalis', $artikelDetail->jurnalis??'') }}"  required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ old('deskripsi', $artikelDetail->deskripsi??'') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_terbit" class="form-label">Tahun Terbit</label>
                        <input type="number" class="form-control" id="tanggal_terbit" name="tanggal_terbit" min="1900" max="2099" value="{{ old('tanggal_terbit', $artikelDetail->tanggal_terbit??'') }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>

        <!-- Bootstrap JS Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
