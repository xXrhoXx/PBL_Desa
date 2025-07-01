<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 14px;
            margin: 50px;
        }

        .header {
            border-bottom: 3px solid black;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .kop-container {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo {
            width: 80px;
            height: 100px;
            margin-right: 10px;
        }

        .kop {
            text-align: center;
        }

        .kop .title {
            font-size: 16px;
            font-weight: bold;
        }

        .kop .desa {
            font-size: 18px;
            font-weight: bold;
        }

        .kop .alamat {
            font-size: 13px;
        }

        .title-surat {
            text-align: center;
            margin: 20px 0;
            font-weight: bold;
            text-decoration: underline;
            font-size: 16px;
        }

        .nomor {
            text-align: center;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .isi {
            text-align: justify;
            line-height: 1.6;
        }

        .data-table {
            margin: 15px 0 20px 20px;
            border-spacing: 0 5px;
        }

        .data-table td {
            vertical-align: top;
            padding-right: 5px;
        }

        .ttd {
            margin-top: 50px;
            text-align: right;
        }

        .ttd .nama {
            margin-top: 80px;
            font-weight: bold;
            text-decoration: underline;
        }

        .bold {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="kop-container">
            <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Lambang_Kabupaten_Malang.png" alt="Logo" class="logo">
            <div class="kop">
                <div class="title">PEMERINTAH KABUPATEN MALANG</div>
                <div class="title">KECAMATAN PONCOKUSUMO</div>
                <div class="desa">DESA WRINGINANOM</div>
                <div class="alamat">Jl. Raya Wringinanom Nomor 12 Kode Post 65157</div>
            </div>
        </div>
    </div>

    <div class="title-surat">SURAT KETERANGAN</div>
    <div class="nomor">Nomor: 401 / 35.07.08.2012/2020</div>

    <div class="isi">
        Yang bertanda tangan di bawah ini Kepala Desa Wringinanom Kecamatan Poncokusumo Kabupaten Malang menerangkan dengan sebenarnya bahwa:
        
        <table class="data-table">
            <tr><td>Nama</td><td>:</td><td>{{ $nama }}</td></tr>
            <tr><td>NIK</td><td>:</td><td>{{ $nik }}</td></tr>
            <tr><td>No KK</td><td>:</td><td>{{ $kk }}</td></tr>
            <tr><td>Tanggal Lahir</td><td>:</td><td>{{ \Carbon\Carbon::parse($tanggal_lahir)->translatedFormat('d F Y') }}</td></tr>
            <tr><td>Noka BPJS</td><td>:</td><td>{{ $noka }}</td></tr>
            <tr><td>Program PBI</td><td>:</td><td>PBI NON BDT AKTIF</td></tr>
            <tr><td>Alamat</td><td>:</td><td>{{ $alamat }}</td></tr>
        </table>

        Orang tersebut di atas benar-benar penduduk Desa Wringinanom Kecamatan Poncokusumo Kabupaten Malang, berdasarkan hasil verifikasi yang dilakukan oleh Pemerintah Desa Wringinanom orang tersebut di atas <span class="bold"><i>termasuk keluarga mampu</i></span>.

        <br><br>

        Surat Keterangan ini diperlukan untuk menonaktifkan status keikutsertaan PBI JKN – KIS.

        <br><br>

        Demikian surat keterangan ini dibuat untuk dapat digunakan sebagaimana mestinya.
    </div>

    <div class="ttd">
        <div>Wringinanom, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</div>
        <div>Kepala Desa Wringinanom</div>
        <div class="nama">AHMAD MUSLIMIN</div>
    </div>


</body>
</html>