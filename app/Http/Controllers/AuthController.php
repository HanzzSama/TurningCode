<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function showLogin()
    {
        return view('index', ['page' => 'login']);
    }

    public function showRegister()
    {
        return view('index', ['page' => 'register']);
    }

    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/login')->with('success','Register berhasil, silakan login');

    }

    public function login(Request $request)
    {

        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)){

            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->with('error','Email atau password salah');
    }

    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');

    }
}
