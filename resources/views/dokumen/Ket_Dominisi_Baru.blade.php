<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SURAT KETERANGAN DOMISILI</title>
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
            display: table;
            width: 100%;
        }

        .logo {
            display: table-cell;
            width: 90px;
            text-align: center;
            vertical-align: middle;
        }

        .logo img {
            width: 70px;
            height: 90px;
        }

        .kop {
            display: table-cell;
            text-align: center;
            vertical-align: middle;
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

        .judul-surat {
            text-align: center;
            font-weight: bold;
            text-decoration: underline;
            font-size: 16px;
            margin-top: 20px;
        }

        .nomor {
            text-align: center;
            margin-bottom: 20px;
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
            margin-top: 40px;
            text-align: right;
        }

        .ttd .nama {
            margin-top: 60px;
            font-weight: bold;
            text-decoration: underline;
        }

        .bold {
            font-weight: bold;
        }

        .underline {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="kop-container">
            <div class="logo">
                <img src="{{ public_path('images/Lambang_Kabupaten_Malang.png') }}" alt="Logo">
            </div>
            <div class="kop">
                <div class="title">PEMERINTAH KABUPATEN MALANG</div>
                <div class="title">KECAMATAN PONCOKUSUMO</div>
                <div class="desa">DESA WRINGINANOM</div>
                <div class="alamat">Jalan Raya Wringinanom Nomor 12 Kode Pos 65157</div>
            </div>
        </div>
    </div>

    <div class="judul-surat">SURAT KETERANGAN DOMISILI</div>
    <div class="nomor">Nomor: {{ $nomor ?? '400.10.2.2 / 35.07.07.2014/2024' }}</div>

    <div class="isi">
        Yang bertanda tangan di bawah ini Kepala Desa Wringinanom Kecamatan Poncokusumo Kabupaten Malang, menerangkan dengan sebenarnya bahwa:
        <table class="data-table">
            <tr><td>Nama</td><td>:</td><td>{{ $nama }}</td></tr>
            <tr>
                <td>Tempat / Tgl Lahir</td><td>:</td>
                <td>{{ $tempat_lahir }}, {{ \Carbon\Carbon::parse($tanggal_lahir)->format('d-m-Y') }}</td>
            </tr>
            <tr><td>Nomor NIK</td><td>:</td><td>{{ $nik }}</td></tr>
            <tr><td>Jenis Kelamin</td><td>:</td><td>{{ $jenis_kelamin }}</td></tr>
            <tr><td>Agama</td><td>:</td><td>{{ $agama }}</td></tr>
            <tr><td>Status Perkawinan</td><td>:</td><td>{{ $status_perkawinan }}</td></tr>
            <tr><td>Kewarganegaraan</td><td>:</td><td>{{ $kewarganegaraan }}</td></tr>
            <tr>
                <td>Alamat Domisili</td><td>:</td>
                <td>{{ $alamat_domisili }}</td>
            </tr>
        </table>

        Berdasarkan keterangan orang tersebut di atas <span class="bold underline">Semasa Hidupnya</span> benar-benar berdomisili di Desa Wringinanom Kecamatan Poncokusumo.

        <br><br>
        Demikian surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
    </div>

    <div class="ttd">
        <div>Wringinanom, {{ \Carbon\Carbon::parse($tanggal_surat)->translatedFormat('d F Y') }}</div>
        <div>Kepala Desa Wringinanom</div>
        <div class="nama">AHMAD MUSLIMIN</div>
    </div>

</body>
</html>
