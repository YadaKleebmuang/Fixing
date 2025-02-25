<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Repair;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class PDFController extends Controller
{
    // ฟังก์ชันสำหรับสร้าง PDF
    public function generatePDF()
    {
        // ดึงข้อมูลจากตาราง repairs
        $repairs = Repair::all();

        // โหลด view และส่งข้อมูลเข้าไป
        $pdf = FacadePdf::loadView('pdf.repair_report', compact('repairs'));

        // ดาวน์โหลดไฟล์ PDF
        return $pdf->download('repair_report.pdf');
    }
}

