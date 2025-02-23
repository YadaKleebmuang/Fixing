<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RepairController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthenController::class, 'register'])->name('register');
    Route::post('/register/authenticate', [AuthenController::class, 'store'])->name('register.auth');
    route::get('/login', [AuthenController::class, 'Login'])->name('login');
    Route::post('/login/authenticate', [AuthenController::class, 'Authen'])->name('login.authenticate');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login'); // ✅ Redirect ไปหน้า Login หลังจาก Logout
})->name('logout');

// Routes สำหรับ Repair
Route::get('/repairs', [RepairController::class, 'index'])->name('repair.index');
Route::get('/repairs/create', [RepairController::class, 'create'])->name('repair.create');
Route::post('/repairs', [RepairController::class, 'store'])->name('repair.store');
Route::get('/repairs/{id}', [RepairController::class, 'show'])->name('repair.show');
Route::get('/repairs/{id}/edit', [RepairController::class, 'edit'])->name('repair.edit');
Route::put('/repairs/{id}', [RepairController::class, 'update'])->name('repair.update');
Route::delete('/repairs/{id}', [RepairController::class, 'destroy'])->name('repair.destroy');
Route::get('/repairs/track', [RepairController::class, 'track'])->name('repair.track');

