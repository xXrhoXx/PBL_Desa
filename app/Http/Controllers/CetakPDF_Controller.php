<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class CetakPDF_Controller extends Controller
{

    function index() {
        return view('dokumen.index');
    }
    function SPKV_pdf()
    {
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML(view('dokumen.SPKV'));
        $mpdf->Output();
    }
    function surat_tidak_mampu_pdf()
    {
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML(view('dokumen.Ket_tidak_mampu'));
        $mpdf->Output();
    }
    function surat_belum_menikah_pdf()
    {
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML(view('dokumen.Ket_belum_menikah'));
        $mpdf->Output();
    }
    function surat_hilang_kk_pdf()
    {
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML(view('dokumen.Ket_Hilang_KK'));
        $mpdf->Output();
    }

    //form cetak pdf
    function formSPKV() {
        return view('dokumen.formSPKV');
    }
    function formKet_tidak_mampu() {
        return view('dokumen.formKet_tidak_mampu');
    }
    function formKet_belum_menikah() {
        return view('dokumen.formKet_belum_menikah');
    }
    function formKet_hilang_kk() {
        return view('dokumen.formKet_hilang_kk');
    }
    function formKet_domisili_baru() {
        return view('dokumen.formKet_domisili_baru');
    }



    // Proses generate PDF berdasarkan data input

    // sutar SPKV
    public function generateSPKV_Pdf(Request $request)
    {
        // Validasi input form
        $request->validate([
            'nama'           => 'required|string|max:100',
            'nik'            => 'required|string|max:20',
            'kk'             => 'required|string|max:20',
            'tanggal_lahir'  => 'required|date',
            'noka'           => 'required|string|max:20',
            'alamat'         => 'required|string|max:255',
        ]);

        // Kirim data ke view PDF
        $data = [
            'nama'           => $request->nama,
            'nik'            => $request->nik,
            'kk'             => $request->kk,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'noka'           => $request->noka,
            'alamat'         => $request->alamat,
        ];

        $pdf = Pdf::loadView('dokumen.SPKV', $data);

        return $pdf->stream('SPKV.pdf'); // tampilkan PDF di tab baru
    }


// Surat keterangan tidak mampu
public function generateSKTM_Pdf(Request $request)
{
    // Validasi input form
    $request->validate([
        'nama'            => 'required|string|max:100',
        'nik'             => 'required|string|max:20',
        'nkk'             => 'required|string|max:20',
        'jenis_kelamin'   => 'required|string|in:Laki-laki,Perempuan',
        'tempat_lahir'    => 'required|string|max:50',
        'tanggal_lahir'   => 'required|date',
        'kewarganegaraan' => 'required|string|max:50',
        'alamat'          => 'required|string|max:255',
    ]);

    // Kirim data ke view PDF
    $data = [
        'nama'            => $request->nama,
        'nik'             => $request->nik,
        'nkk'             => $request->nkk,
        'jenis_kelamin'   => $request->jenis_kelamin,
        'tempat_lahir'    => $request->tempat_lahir,
        'tanggal_lahir'   => $request->tanggal_lahir,
        'kewarganegaraan' => $request->kewarganegaraan,
        'alamat'          => $request->alamat,
    ];

    $pdf = Pdf::loadView('dokumen.Ket_tidak_mampu', $data);

    return $pdf->stream('Surat_Keterangan_Tidak_Mampu.pdf'); // Tampilkan di tab baru
}

// sutar keterangan belum menikah
public function generateSKBM_Pdf(Request $request)
{
    // Validasi input form
    $request->validate([
        'nama'              => 'required|string|max:100',
        'nik'               => 'required|string|max:20',
        'nkk'               => 'required|string|max:20',
        'jenis_kelamin'     => 'required|string|in:Laki-laki,Perempuan',
        'tempat_lahir'      => 'required|string|max:50',
        'tanggal_lahir'     => 'required|date',
        'agama'             => 'required|string|max:50',
        'status_perkawinan' => 'required|string|in:Belum Kawin,Kawin',
        'kewarganegaraan'   => 'required|string|max:50',
        'alamat'            => 'required|string|max:255',
    ]);

    // Kirim data ke view PDF
    $data = [
        'nama'              => $request->nama,
        'nik'               => $request->nik,
        'nkk'               => $request->nkk,
        'jenis_kelamin'     => $request->jenis_kelamin,
        'tempat_lahir'      => $request->tempat_lahir,
        'tanggal_lahir'     => $request->tanggal_lahir,
        'agama'             => $request->agama,
        'status_perkawinan' => $request->status_perkawinan,
        'kewarganegaraan'   => $request->kewarganegaraan,
        'alamat'            => $request->alamat,
    ];

    $pdf = Pdf::loadView('dokumen.Ket_belum_menikah', $data);

    return $pdf->stream('Surat_Keterangan_Belum_Menikah.pdf');
}


public function generateSKHKK_Pdf(Request $request)
{
    // Validasi input form
    $request->validate([
        'nama'              => 'required|string|max:100',
        'nik'               => 'required|string|max:20',
        'jenis_kelamin'     => 'required|string|in:Laki-laki,Perempuan',
        'tempat_lahir'      => 'required|string|max:50',
        'tanggal_lahir'     => 'required|date',
        'status_perkawinan' => 'required|string|in:Belum Kawin,Kawin',
        'alamat'            => 'required|string|max:255',
    ]);

    // Kirim data ke view PDF
    $data = [
        'nama'              => $request->nama,
        'nik'               => $request->nik,
        'jenis_kelamin'     => $request->jenis_kelamin,
        'tempat_lahir'      => $request->tempat_lahir,
        'tanggal_lahir'     => $request->tanggal_lahir,
        'status_perkawinan' => $request->status_perkawinan,
        'alamat'            => $request->alamat,

        // Tambahan
        'tanggal_surat'     => Carbon::now()->toDateString(), // contoh: '2024-10-20'
        'nomor'             => '470 /35.07.07.2014/2024' // bisa dibuat dinamis jika diperlukan
    ];

    $pdf = Pdf::loadView('dokumen.Ket_Hilang_KK', $data);

    return $pdf->stream('Surat_Keterangan_Hilang_Kartu_Keluarga.pdf');
}

public function generateSuratDomisili_Pdf(Request $request)
{
    // Validasi input
    $request->validate([
        'nama'              => 'required|string|max:100',
        'tempat_lahir'      => 'required|string|max:50',
        'tanggal_lahir'     => 'required|date',
        'nik'               => 'required|string|max:20',
        'jenis_kelamin'     => 'required|in:Laki-laki,Perempuan',
        'agama'             => 'required|string|max:20',
        'status_perkawinan' => 'required|string|max:20',
        'kewarganegaraan'   => 'required|string|max:30',
        'alamat_domisili'   => 'required|string|max:255',
    ]);

    // Susun data
    $data = [
        'nama'              => $request->nama,
        'tempat_lahir'      => $request->tempat_lahir,
        'tanggal_lahir'     => $request->tanggal_lahir,
        'nik'               => $request->nik,
        'jenis_kelamin'     => $request->jenis_kelamin,
        'agama'             => $request->agama,
        'status_perkawinan' => $request->status_perkawinan,
        'kewarganegaraan'   => $request->kewarganegaraan,
        'alamat_domisili'   => $request->alamat_domisili,
        'tanggal_surat'     => Carbon::now()->toDateString(),
        'nomor'             => '400.10.2.2 / 35.07.07.2014/2024', // bisa dinamis juga kalau perlu
    ];

    // Load view blade untuk PDF
    $pdf = Pdf::loadView('dokumen.Ket_Dominisi_Baru', $data);

    return $pdf->stream('Surat_Keterangan_Domisili.pdf');
}
}
