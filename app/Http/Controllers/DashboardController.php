<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // ฟังก์ชันสำหรับแสดงหน้า Dashboard
    public function index()
    {
        return view('dashboard'); // เรียกใช้ view: resources/views/theme/dashboard.blade.php
    }
}
