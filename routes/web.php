<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('guest')->group(function()
{
    Route::get('/register', [AuthenController::class, 'register'])->name('register');
    Route::post('/register/authenticate',[AuthenController::class,'store'])->name('register.auth');
    route::get('/login', [AuthenController::class, 'Login'])->name('login');
    Route::post('/login/authenticate',[AuthenController::class,'Authen'])->name('login.authenticate');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login'); // ✅ Redirect ไปหน้า Login หลังจาก Logout
})->name('logout');