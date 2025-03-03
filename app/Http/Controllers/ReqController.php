<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Repair;
use Exception;
use Illuminate\Support\Facades\Hash;

class ReqController extends Controller
{
    public function storeRepair(Request $req)
    {
        try {
            $validatedData = $req->validate([
                'repair_detail' => 'required|string',
            ]);

            $customerId = Auth::id();
            Repair::create([
                'customer_id' => $customerId,
                'repair_detail' => $validatedData['repair_detail'],
                'employee_id' => null,
            ]);

            return redirect()->route('customer.dashboard')->with('success', 'Repair record created successfully.');
        } catch (Exception $e) {

            Log::error('Error creating repair record: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroyRepair($id)
    {
        try {
            $repair = Repair::findOrFail($id);
            $repair->delete();
            return redirect()->route('customer.dashboard')->with('success', 'Repair record deletes successfully.');
        } catch (Exception $e) {
            Log::error('Error deleting repair record' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function Editrepair($id)
    {
        $repair_edit = Repair::findOrFail($id);
        return view('customer.updaterepair', compact('repair_edit'));
    }


    public function UpdateRepair(Request $request, $id)
    {
        $repair = Repair::findOrFail($id);
        $repair->repair_detail = $request->repair_detail;
        $repair->save();

        return redirect()->route('customer.dashboard')->with('success', 'Repair request updated successfully!');
    }

    public function SelectEmp($id)
    {
        $repair_edit = Repair::findOrFail($id);
        $emp = User::where('is_admin', 2)->get();
        return view('admin.select_emp', compact('repair_edit', 'emp'));
    }


    public function assignRepair(Request $request, $id)
    {
        $request->validate([
            'employee_id' => 'required|exists:users,id',

        ]);

        $repair = Repair::findOrFail($id);
        $repair->employee_id = $request->employee_id;
        $repair->status = "progress";
        $repair->save();
        return redirect()->route('admin.dashboard')->with('success', 'Employee assigned to repair request successfully!');
    }


    public function AddEmpToList(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',

        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => 2, //is_employee
        ]);

        return redirect('admin.dashboard')->with('success', 'Employee assigned to repair request successfully!');
    }

    public function SuccessRepair($id)
    {
        $repair = Repair::findOrFail($id);
        $repair->status = "done";
        $repair->save();
        return redirect('/dashboard/emp')->with('success', 'Employee assigned to repair request successfully!');
    }
}
