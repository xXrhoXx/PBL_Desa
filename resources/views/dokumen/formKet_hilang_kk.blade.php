<!DOCTYPE html>
<html>
<head>
    <title>Form Cetak Surat Kehilangan KK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .custom-theme {
            background-color: rgba(25, 135, 84, 1) !important;
            color: white !important;
        }

        .text-custom {
            color: rgba(25, 135, 84, 1) !important;
        }

        .btn-custom {
            background-color: rgba(25, 135, 84, 1) !important;
            border-color: rgba(25, 135, 84, 1) !important;
            color: white !important;
        }

        .btn-custom:hover {
            background-color: rgba(20, 110, 70, 1) !important;
            border-color: rgba(20, 110, 70, 1) !important;
        }
    </style>
</head>
<body class="bg-light">
    @include('layouts.navbar')

    <div class="container py-5 pb-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-custom">Formulir Surat Kehilangan KK</h2>
            <p class="text-muted">Silakan periksa dan lengkapi data berikut untuk mencetak Surat Kehilangan</p>
        </div>

        <div class="card shadow-lg border-0">
            <div class="card-header custom-theme">
                <h5 class="mb-0">Form Data Diri - Cetak Surat Kehilangan KK</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('cetakSKHKKpdf') }}" method="POST" target="_blank">
                    @csrf

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama"  required>
                    </div>

                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"  required>
                    </div>

                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik"  required>
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="Laki-laki" selected>Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="status_perkawinan" class="form-label">Status Perkawinan</label>
                        <select class="form-select" id="status_perkawinan" name="status_perkawinan" required>
                            <option value="Belum Kawin">Belum Kawin</option>
                            <option value="Kawin" selected>Kawin</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="alamat" class="form-label">Alamat Lengkap</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-custom w-100">Cetak Surat</button>
                </form>
            </div>
        </div>
    </div>

    @include('layouts.footer')
</body>
</html>
