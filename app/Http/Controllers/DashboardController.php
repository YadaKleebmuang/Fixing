<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Repair;
use Exception;

class DashboardController extends Controller
{
    public function DashboardCustomer()
    {
        $customerId = Auth::id();
        $repair = Repair::with('customer', 'status')
            ->where('customer_id', $customerId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view("customer.dashboard", compact('repair'));
    }
    public function DashboardAdmin()
    {
        $repair = Repair::get();
        return view("admin.dashboard", compact('repair'));
    }
    public function DashboardEmployee()
    {
        $employeeId = Auth::id();
        $repair = Repair::where('employee_id', $employeeId)->get();
        return view("employee.dashboard", compact('repair'));
    }


    public function AddEmployee()
    {
        return view("admin.addemp");
    }


    
}
