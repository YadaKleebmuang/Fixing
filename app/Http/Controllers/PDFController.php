<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $data = [
            'title' => 'รายงานการซ่อม',
            'date' => date('d/m/Y')
        ];

        $pdf = PDF::loadView('pdf.repair_report', $data);
        return $pdf->download('repair_report.pdf');
    }
}
