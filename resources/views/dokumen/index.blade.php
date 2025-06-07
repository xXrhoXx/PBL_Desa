<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Dokumen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">

    <div class="container">
        <h1 class="mb-4">Selamat Datang</h1>

        <table class="table table-bordered">
            <thead class="table-warning">
                <tr>
                    <th>No</th>
                    <th>Jenis Surat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>SPKV</td>
                    <td>
                        <a href="{{ route('cetak.SPKV') }}" class="btn btn-sm btn-primary">Cetak</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Tes</td>
                    <td>
                        <a href="{{ route('cetak.tes') }}" class="btn btn-sm btn-primary">Cetak</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
</html>
