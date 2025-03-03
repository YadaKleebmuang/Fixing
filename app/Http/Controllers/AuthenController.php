<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AuthenController extends Controller
{

    //Store,Save data
    public function Register(Request $request)
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
            'is_admin' => 1, //is_customer
        ]);

        return redirect('/');
    }

    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            session()->put('message', $user->name);

            if ($user->is_admin == 1) {
                return redirect()->route('customer.dashboard');
            } else if ($user->is_admin == 0) {
                return redirect()->route('admin.dashboard');
            } else if ($user->is_admin == 2) {
                return redirect()->route('employee.dashboard');
            }
            return redirect('/');

        }
        return Redirect::back()->withErrors(['email' => 'invalid email or password . ! '])->withInput();
    }

}
