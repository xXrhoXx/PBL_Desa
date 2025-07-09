<!DOCTYPE html>
<html>
<head>
    <title>Form Cetak SPKV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    @include('layouts.navbar')

    <div class="container py-5 pb-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-success">Formulir Data Diri</h2>
            <p class="text-muted">Silakan isi data dengan lengkap untuk mencetak dokumen SPKV</p>
        </div>

        <div class="card shadow-lg border-0">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Form Data Diri - Cetak SPKV</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('cetak-pdf') }}" method="POST" target="_blank">
                    @csrf

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>

                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" required>
                    </div>

                    <div class="mb-3">
                        <label for="kk" class="form-label">Nomor Kartu Keluarga (KK)</label>
                        <input type="text" class="form-control" id="kk" name="kk" required>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                    </div>

                    <div class="mb-3">
                        <label for="noka" class="form-label">Nomor Kartu BPJS (NOKA)</label>
                        <input type="text" class="form-control" id="noka" name="noka" required>
                    </div>

                    <div class="mb-4">
                        <label for="alamat" class="form-label">Alamat Lengkap</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Lihat PDF</button>
                </form>
            </div>
        </div>
    </div>

    @include('layouts.footer')
</body>
</html>
