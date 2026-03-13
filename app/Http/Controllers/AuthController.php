<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
        // Validasi input
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6'
        ]);

        // Kalau validasi gagal
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'user'
            ]);

            return redirect('/login')->with('success','Register berhasil, silakan login');

        } catch (\Exception $e) {
            \Log::error('Gagal registrasi: '.$e->getMessage());
            return back()->with('error','Registrasi gagal. Silakan coba lagi.');
        }
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $codeInput = $request->input('codeOTP', $request->password);

        $adminEmails = [
            'hanzz@turncode.com' => 'haidarandrianno098@gmail.com',
            'Jester@turncode.com' => 'susiawanandika06@gmail.com',
            'ghostface@turncode.com' => 'kasogihiqmal01@gmail.com',
            'Mychel09@turncode.com' => 'dandibdr2209@gmail.com',
        ];

        // Jika admin login pertama kali (password kosong)
        if (array_key_exists($email, $adminEmails) && empty($codeInput)) {
            $code = rand(100000, 999999);
            $hashedCode = Hash::make($code);

            DB::table('admin_codes')->updateOrInsert(
                ['email' => $email],
                [
                    'code' => $hashedCode,
                    'expired_at' => now()->addMinutes(10),
                    'updated_at' => now(),
                    'created_at' => now()
                ]
            );

            try {
                Mail::raw("Kode login admin Anda: $code", function($message) use ($adminEmails, $email){
                    $message->to($adminEmails[$email])
                            ->subject("Kode Login Admin TurningCode");
                });
            } catch (\Exception $e) {
                return back()->with('error', 'Gagal mengirim kode OTP: ' . $e->getMessage());
            }

            return back()->with('info','Kode login admin telah dikirim ke email terkait.');
        }

        // Jika admin input kode OTP
        if (array_key_exists($email, $adminEmails)) {
            $adminCode = DB::table('admin_codes')
                ->where('email', $email)
                ->where('expired_at','>', now())
                ->first();

            if ($adminCode && Hash::check($codeInput, $adminCode->code)) {
                $user = User::firstOrCreate(
                    ['email' => $email],
                    ['name' => 'Admin', 'password' => Hash::make(Str::random(12)), 'role'=>'admin']
                );

                Auth::login($user);
                DB::table('admin_codes')->where('email',$email)->delete();

                return redirect('/admin')->with('success','Anda berhasil login sebagai admin');
            }

            return back()->with('error','Kode admin salah atau kadaluarsa.');
        }

        // Login user biasa
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return Auth::user()->role == 'admin' ? redirect('/admin') : redirect('/');
        }

        return back()->with('error','Email atau password salah');
    }

    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success','Anda berhasil log out');

    }
}
