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

    <div class="container py-5">
        <h1 class="mb-4 fw-bold">Selamat Datang</h1>

        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Daftar Dokumen</h5>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col" class="text-center" style="width: 50px;">No</th>
                            <th scope="col">Jenis Surat</th>
                            <th scope="col" class="text-center" style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>SPKV</td>
                            <td class="text-center">
                                <a href="{{ route('form.SPKV') }}" class="btn btn-sm btn-primary">Cetak</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>Tes</td>
                            <td class="text-center">
                                <a href="{{ route('cetak.tes') }}" class="btn btn-sm btn-primary">Cetak</a>
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
