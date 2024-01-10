<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFcontroller extends Controller
{
    public function generatePDF()
    {
        $data=[
            'title' => 'Prototype PDF',
            'date' => date('m/d/Y')
        ];
        $pdf = PDF::loadView('pdf.myPDF',$data);
        return $pdf->download('invoice.pdf');
    }
}
