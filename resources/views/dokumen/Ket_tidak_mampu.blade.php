<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Tidak Mampu</title>
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

    <!-- Halaman SKTM -->
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

    <div class="title-surat">SURAT KETERANGAN TIDAK MAMPU</div>
    <div class="nomor">Nomor: 421/ &nbsp;&nbsp;/350.07.07.2014/2023</div>

    <div class="isi">
        Yang bertanda tangan dibawah Kepala Desa Wringinanom Kecamatan Poncokusumo Kabupaten Malang menerangkan dengan sebenarnya bahwa:

        <table class="data-table">
            <tr><td>Nama</td><td>:</td><td>{{ strtoupper($nama) }}</td></tr>
            <tr><td>NIK</td><td>:</td><td>{{ $nik }}</td></tr>
            <tr><td>N0_KK</td><td>:</td><td>{{ $no_kk }}</td></tr>
            <tr><td>Jenis Kelamin</td><td>:</td><td>{{ $jenis_kelamin }}</td></tr>
            <tr>
                <td>Tempat/tgl.lahir</td>
                <td>:</td>
                <td>{{ $tempat_lahir }}, {{ \Carbon\Carbon::parse($tgl_lahir)->format('d-m-Y') }}</td>
            </tr>
            <tr><td>Kewarganegaraan</td><td>:</td><td>{{ $kewarganegaraan }}</td></tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>
                    {{ $alamat }}
                </td>
            </tr>
        </table>

        Bahwa orang tersebut di atas adalah benar-benar <span class="bold">Penduduk kurang mampu</span> Desa Wringinanom Kecamatan Poncokusumo Kabupaten Malang.

        <br><br>
        Demikian surat keterangan ini kami buat dengan sebenarnya untuk dipergunakan sebagaimana perlunya.
    </div>

    <div class="ttd">
        <div>Wringinanom, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</div>
        <div>Kepala Desa Wringinanom</div>
        <div class="nama">AHMAD MUSLIMIN</div>
    </div>

</body>
</html>
