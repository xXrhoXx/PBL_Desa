<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
