<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    use HasFactory;

    // ระบุชื่อตาราง (optional ถ้าตารางชื่อ "repairs" อยู่แล้วไม่ต้องใส่)
    protected $table = 'repairs';

    // ฟิลด์ที่สามารถกรอกข้อมูลได้ (Mass Assignment)
    protected $fillable = [
        'user_name',      // ชื่อผู้แจ้งซ่อม
        'phone',          // เบอร์โทร
        'description',    // รายละเอียดการซ่อม
        'equipment',      // อุปกรณ์ที่ซ่อม
        'status'          // สถานะ (pending, in progress, completed)
    ];

    // ค่าเริ่มต้นของ attributes
    protected $attributes = [
        'status' => 'pending',
    ];

    // ถ้าต้องการปิดการใช้ timestamps (created_at, updated_at) ให้ใช้:
    // public $timestamps = false;

    // Example: สร้างฟังก์ชัน Custom Query Scope
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    // Example: ฟังก์ชันสำหรับตรวจสอบว่าการซ่อมเสร็จหรือยัง
    public function isCompleted()
    {
        return $this->status === 'completed';
    }
}
