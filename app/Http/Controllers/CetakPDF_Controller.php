<?php

namespace App\Http\Controllers;

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
    function tes_pdf()
    {
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML('<h1>Hello world!</h1>');
        $mpdf->Output();
    }

    //form
    function formSPKV() {
        return view('dokumen.formSPKV');
    }

      // Menampilkan halaman form input data diri
    public function showForm()
    {
        return view('cetak.form');
    }

    // Proses generate PDF berdasarkan data input
    public function generatePdf(Request $request)
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
}
