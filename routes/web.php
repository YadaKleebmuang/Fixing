<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReqController;


Route::get('/', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
    ;
});
Route::post('/register', [AuthenController::class, 'Register'])->name('register.auth');
Route::post('/login', [AuthenController::class, 'Login'])->name('login.authenticate');

Route::middleware('admin')->group(function () {
    Route::get('/dashboard/admin', [DashboardController::class, 'DashboardAdmin'])->name('admin.dashboard');
    Route::get('/dashboard/select_emp/{id}', [ReqController::class, 'SelectEmp'])->name('select.emp');
    Route::put('/dashboard/assign_repair/{id}', [ReqController::class, 'assignRepair'])->name('assign.repair');
    Route::get('/dashboard/admin/addemp', [DashboardController::class, 'AddEmployee'])->name('add.employeepage');
    Route::post('/dashboard/admin/addemp', [ReqController::class, 'AddEmpToList'])->name('add.employee');
});


Route::middleware('customer')->group(function () {
    Route::get('/dashboard/customer', [DashboardController::class, 'DashboardCustomer'])->name('customer.dashboard');
    Route::post('/dashboard/addrepair', [ReqController::class, 'storeRepair'])->name('repair.store');
    Route::delete('/dashboard/deleterepair/{id}', [ReqController::class, 'destroyRepair'])->name('delrepair');
    Route::get('/dashboard/customer/{id}', [ReqController::class, 'Editrepair'])->name('editrepair');
    Route::put('/dashboard/update/{id}', [ReqController::class, 'UpdateRepair'])->name('repair.update');
});



Route::middleware('emp')->group(function () {
    Route::get('/dashboard/emp', [DashboardController::class, 'DashboardEmployee'])->name('employee.dashboard');
    Route::patch('/dashboard/success/{id}', [ReqController::class, 'SuccessRepair'])->name('done.working');
});




// Route สำหรับ Logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

