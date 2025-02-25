<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\PDFController;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// ==================== 🔐 AUTHENTICATION ====================
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthenController::class, 'register'])->name('auth.register');
    Route::post('/register/authenticate', [AuthenController::class, 'store'])->name('register.auth');
    Route::get('/login', [AuthenController::class, 'Login'])->name('auth.login');
    Route::post('/login/authenticate', [AuthenController::class, 'Authen'])->name('login.authenticate');
});

// Route สำหรับ Logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// ==================== 🛠️ REPAIRS ====================

// ✅ 1. แสดงรายการงานซ่อม
Route::get('/repairs', [RepairController::class, 'index'])->name('repair.index');

// ✅ 2. สร้างงานซ่อมใหม่
Route::get('/repairs/create', [RepairController::class, 'create'])->name('repair.create');
Route::post('/repairs', [RepairController::class, 'store'])->name('repair.store');

// ✅ 3. ติดตามงานซ่อม (ต้องอยู่ก่อน /repairs/{id})
Route::get('/repairs/track', [RepairController::class, 'track'])->name('repair.track');

// ✅ 4. แสดงรายละเอียดงานซ่อม
Route::get('/repairs/{id}', [RepairController::class, 'show'])->name('repair.show');

// ✅ 5. แก้ไขงานซ่อม
Route::get('/repairs/{id}/edit', [RepairController::class, 'edit'])->name('repair.edit');
Route::put('/repairs/{id}', [RepairController::class, 'update'])->name('repair.update');

// ✅ 6. ลบงานซ่อม
Route::delete('/repairs/{id}', [RepairController::class, 'destroy'])->name('repair.destroy');



// ==================== 📦 PDF ====================
// Route::get('/repairs/{id}/pdf', [PDFController::class, 'generatePDF'])->name('pdf.generate');


Route::get('/repairs/download-pdf', [PDFController::class, 'generatePDF'])->name('repairs.download.pdf');
// Route::get('/repairs/{id}/download-pdf', [PDFController::class, 'generatePDF'])->name('repairs.download.pdf');