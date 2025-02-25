<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;



use Illuminate\Http\Request;
use App\Models\Repair;

class RepairController extends Controller
{
    // 📋 แสดงรายการซ่อมทั้งหมด
    public function index()
    {
        // ดึงข้อมูลทั้งหมดจากฐานข้อมูล
        $repairs = Repair::all();

        // ส่งข้อมูลไปที่ view
        return view('repair.index', compact('repairs'));
    }

    // 🛠️ แสดงฟอร์มแจ้งซ่อม
    public function create()
    {
        return view('repair.create');
    }

    // ✅ บันทึกข้อมูลแจ้งซ่อมใหม่
    public function store(Request $request)
    {
        $request->validate([
            'user_name'   => 'required|string|max:255',
            'phone'       => 'required|digits:10', // ✅ ตรวจสอบให้ใส่ตัวเลข 10 หลักเท่านั้น
            'equipment'   => 'required|string|max:255',
            'description' => 'required|string',
        ], [
            'phone.required' => 'กรุณากรอกหมายเลขโทรศัพท์',
            'phone.digits'   => 'หมายเลขโทรศัพท์ต้องมี 10 หลัก',
        ]);

        Repair::create([
            'user_name'   => $request->user_name,
            'phone'       => $request->phone,
            'equipment'   => $request->equipment,
            'description' => $request->description,
            'status'      => 'pending',
        ]);

        return redirect()->route('repair.index')->with('success', 'แจ้งซ่อมสำเร็จ!');
    }

    // 🔍 แสดงรายละเอียดงานซ่อม
    public function show($id)
    {
        $repair = Repair::findOrFail($id); // ดึงข้อมูลงานซ่อมจากฐานข้อมูล
        return view('repair.show', compact('repair'));
        // ส่งข้อมูลไปยัง view
    }

    // ✏️ แสดงฟอร์มแก้ไขงานซ่อม
    public function edit($id)
    {
        $repair = Repair::findOrFail($id);
        return view('repair.edit', compact('repair'));
    }

    // 💾 อัปเดตข้อมูลงานซ่อม
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_name'   => 'required|string|max:255',
            'phone'       => 'required|string|max:20',
            'description' => 'required|string',
            'equipment'   => 'required|string|max:255',
            'status'      => 'required|string'
        ]);

        $repair = Repair::findOrFail($id);
        $repair->update($request->all());

        return redirect()->route('repair.index')->with('success', 'อัปเดตข้อมูลสำเร็จ!');
    }

    // 🗑️ ลบข้อมูลงานซ่อม
    public function destroy($id)
    {
        $repair = Repair::findOrFail($id);
        $repair->delete();

        return redirect()->route('repair.index')->with('success', 'ลบข้อมูลสำเร็จ!');
    }

    // 🛠 ฟังก์ชันติดตามงานซ่อม
    public function track()
    {
        try {
            // ดึงข้อมูลงานซ่อมทั้งหมด
            $repairs = Repair::all();
    
            // ตรวจสอบว่ามีข้อมูลหรือไม่
            if ($repairs->isEmpty()) {
                return view('repair.track')->with('message', 'ไม่มีข้อมูลงานซ่อม');
            }
    
            return view('repair.track', compact('repairs'));
        } catch (\Exception $e) {
            // แสดง Error หากเกิดปัญหา
            return response()->json(['error' => $e->getMessage()]);
        }
    }


    public function downloadPdf()
    {
        // ดึงข้อมูลทั้งหมดจากฐานข้อมูล
        $repairs = Repair::all();

        // โหลด view สำหรับสร้าง PDF
        $pdf = PDF::loadView('repairs.pdf', compact('repairs'));

        // ดาวน์โหลดไฟล์ PDF
        return $pdf->download('repair_report.pdf');
    }
}
