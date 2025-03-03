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

    //Register
    public function register()
    {
        return view('auth.register'); 
    }

    //Store,Save data
    public function Store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'], 
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        return redirect()->route('auth.login');
    }

    //Login
    public function Login()
    {
        return view('auth.login');
    }
    public function Authen(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $authen = Auth::attempt($credentials);
        if (!$authen) {
            Session::flash('error', 'Credentals not match!');
            return Redirect::back();
        } else {
            return redirect()->route('dashboard'); // ต้องไปที่หน้า home
        }
    }
    //logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login'); // ✅ Redirect ไปหน้า Login
    }
}
