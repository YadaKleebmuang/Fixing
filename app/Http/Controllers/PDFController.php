<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use SVG\Tag\Rect;
use App\Models\Repair; // Import Model Repair

class PDFController extends Controller
{
    public function generateRepairPDF()
    {
        // ดึงข้อมูลรายการซ่อมทั้งหมดจากฐานข้อมูล
        $repairs = Repair::all();

        // โหลด View 'pdf.repair' และส่งตัวแปร repairs ไปด้วย
        $pdf = PDF::loadView('pdf.repair', compact('repairs'))
            ->setPaper('a4', 'portrait')
            ->setOption(['default_font' => 'THSarabunNew']);

       
        // ดาวน์โหลดไฟล์ PDF
        return $pdf->download('repair_list.pdf');
    }
}
