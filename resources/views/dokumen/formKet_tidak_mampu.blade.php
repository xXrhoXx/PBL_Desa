<!DOCTYPE html>
<html>
<head>
    <title>Form Cetak SKTM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    @include('layouts.navbar')

    <div class="container py-5 pb-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-success">Formulir SKTM</h2>
            <p class="text-muted">Silakan isi data dengan lengkap untuk mencetak Surat Keterangan Tidak Mampu (SKTM)</p>
        </div>

        <div class="card shadow-lg border-0">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Form Data Diri - SKTM</h5>
            </div>
            <div class="card-body">
                <form id="sktmForm" method="POST" action="{{ route('cetakSKTMpdf') }}" target="_blank">
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
                        <label for="no_kk" class="form-label">Nomor Kartu Keluarga </label>
                        <input type="text" class="form-control" id="no_kk" name="no_kk" required>
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="" selected disabled>Pilih jenis kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                    </div>

                    <div class="mb-3">
                        <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                    </div>

                    <div class="mb-3">
                        <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                        <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" value="Indonesia" required>
                    </div>

                    <div class="mb-4">
                        <label for="alamat" class="form-label">Alamat Lengkap</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Cetak Surat</button>
                </form>
            </div>
        </div>
    </div>

    @include('layouts.footer')

    <script>
        function getCookie(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) return parts.pop().split(';').shift();
        }

        document.getElementById('sktmForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const token = getCookie('token');
            if (!token) {
                alert("Token tidak ditemukan dalam cookie.");
                return;
            }

            const form = e.target;

            const data = {
                nama: form.nama.value,
                nik: form.nik.value,
                no_kk: form.no_kk.value,
                jenis_kelamin: form.jenis_kelamin.value,
                tempat_lahir: form.tempat_lahir.value,
                tgl_lahir: form.tgl_lahir.value,
                kewarganegaraan: form.kewarganegaraan.value,
                alamat: form.alamat.value,
            };

            const url = `http://127.0.0.1:8000/api/riwayat-sktm`;

            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
                },
                body: JSON.stringify(data)
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error("Gagal menyimpan riwayat SKTM ke API.");
                }
                form.submit(); // lanjut cetak PDF
            })
            .catch(error => {
                alert("Gagal mengirim data ke API: " + error.message);
            });
        });
    </script>
</body>
</html>
