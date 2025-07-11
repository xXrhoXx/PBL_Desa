<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Dokumen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    @include('layouts.navbar')

    <div class="container py-5 pb-5"> <!-- Tambahan pb-5 di sini -->
        <div class="text-center mb-4">
            <h1 class="fw-bold text-success">Selamat Datang</h1>
            <p class="text-muted">Silakan pilih dokumen yang ingin Anda cetak</p>
        </div>

        <div class="card shadow-lg border-0">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Daftar Dokumen</h5>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered table-hover mb-0">
                    <thead class="table-light text-center">
                        <tr>
                            <th scope="col" style="width: 50px;">No</th>
                            <th scope="col">Jenis Surat</th>
                            <th scope="col" style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <tr>
                            <td class="text-center">1</td>
                            <td>SPKV</td>
                            <td class="text-center">
                                <a href="{{ route('form.SPKV') }}" class="btn btn-sm btn-success">Cetak</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>Surat Keterangan Tidak Mampu</td>
                            <td class="text-center">
                                <a href="{{ route('form.ketTidakMampu') }}" class="btn btn-sm btn-success">Cetak</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>Surat Keterangan Belum Menikah</td>
                            <td class="text-center">
                                <a href="{{ route('form.ketBelumMenikah') }}" class="btn btn-sm btn-success">Cetak</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td>Surat Keterangan Kehilangan Kartu Keluarga</td>
                            <td class="text-center">
                                <a href="{{ route('form.ketHilangKK') }}" class="btn btn-sm btn-success">Cetak</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">5</td>
                            <td>Surat Keterangan Domisili Bari</td>
                            <td class="text-center">
                                <a href="{{ route('form.ketDominisiBaru') }}" class="btn btn-sm btn-success">Cetak</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('layouts.footer')
</body>
</html>
