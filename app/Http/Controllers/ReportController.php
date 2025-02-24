<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repair; // เปลี่ยนตาม Model ที่ใช้
use Barryvdh\DomPDF\Facade\Pdf; // ✅ Import Facade ที่ถูกต้อง

class ReportController extends Controller
{
    // แสดงหน้ารายงาน
    public function index()
    {
        $repairs = Repair::all();
        return view('report.index', compact('repairs'));
    }

    // ออกรายงานเป็น PDF
    public function downloadPdf()
    {
        // ดึงข้อมูลทั้งหมดจากตาราง repairs
        $repairs = Repair::all();

        // โหลด view และส่งข้อมูลไปยัง PDF
        $pdf = PDF::loadView('repairs.report', compact('repairs'));

        // ดาวน์โหลดไฟล์ PDF
        return $pdf->download('repair_report.pdf');
    }
    
    
    public function download()
    {
        $repairs = Repair::all();

        $pdf = PDF::loadView('report', compact('repairs'));

        return $pdf->download('repairs_report.pdf');
    }
}
