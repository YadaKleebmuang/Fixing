<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repair;

class RepairController extends Controller
{
    // 📋 แสดงรายการซ่อมทั้งหมด
    public function index()
    {
        $repairs = Repair::all();
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
            'phone'       => 'required|string|max:20',
            'description' => 'required|string',
            'equipment'   => 'required|string|max:255',
        ]);

        Repair::create([
            'user_name'   => $request->user_name,
            'phone'       => $request->phone,
            'description' => $request->description,
            'equipment'   => $request->equipment,
            'status'      => 'pending' // ค่าเริ่มต้น
        ]);

        return redirect()->route('repair.index')->with('success', 'แจ้งซ่อมสำเร็จ!');
    }

    // 🔍 แสดงรายละเอียดงานซ่อม
    public function show($id)
    {
        $repair = Repair::findOrFail($id);
        return view('repair.show', compact('repair'));
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
        $repairs = Repair::where('status', '!=', 'completed')->get();
        return view('repair.track', compact('repairs'));
    }
}
