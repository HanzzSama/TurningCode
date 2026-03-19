<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    public function index()
    {
        //
    }

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

            return redirect('/login')->with('success', 'Register berhasil, silakan login');
        } catch (\Exception $e) {
            return back()->with('error', 'Registrasi gagal. Silakan coba lagi.');
        }
    }

    public function login(Request $request)
    {
        // ambil email dari input atau session
        $email = $request->email ?? session('admin_email');
        $codeInput = $request->input('codeOTP', $request->password);

        $adminEmails = [
            'hanzz@turncode.com' => 'haidarandrianno098@gmail.com',
            'Jester@turncode.com' => 'susiawanandika06@gmail.com',
            'ghostface@turncode.com' => 'kasogihiqmal01@gmail.com',
            'Mychel09@turncode.com' => 'dandibdr2209@gmail.com',
            'maousama@turncode.com' => 'cyberthang999@gmail.com'
        ];

        if (array_key_exists($email, $adminEmails) && empty($codeInput)) {

            // simpan email ke session (INI YANG PENTING)
            session(['admin_email' => $email]);

            $code = rand(100000, 999999);

            DB::table('admin_codes')->updateOrInsert(
                ['email' => $email],
                [
                    'code' => Hash::make($code),
                    'expired_at' => now()->addMinutes(10),
                    'updated_at' => now(),
                    'created_at' => now()
                ]
            );

            try {
                Mail::raw("Kode login admin Anda: $code", function ($message) use ($adminEmails, $email) {
                    $message->to($adminEmails[$email])
                        ->subject("Kode Login Admin TurningCode");
                });
            } catch (\Exception $e) {
                return back()->with('error', 'Gagal mengirim kode OTP');
            }

            return back()->with('info', 'Kode OTP sudah dikirim');
        }

        if (array_key_exists($email, $adminEmails)) {

            $adminCode = DB::table('admin_codes')
                ->where('email', $email)
                ->where('expired_at', '>', now())
                ->first();

            if ($adminCode && Hash::check($codeInput, $adminCode->code)) {

                $user = User::firstOrCreate(
                    ['email' => $email],
                    [
                        'name' => 'Admin',
                        'password' => Hash::make(Str::random(12)),
                        'role' => 'admin'
                    ]
                );

                Auth::login($user);
                $request->session()->regenerate();
                $user->last_seen = now();
                $user->save();
                $user->update([
                    'last_seen' => now()
                ]);
                // hapus OTP & session
                DB::table('admin_codes')->where('email', $email)->delete();
                session()->forget('admin_email');

                return redirect('/admin')->with('success', 'Login admin berhasil');
            }

            return back()->with('error', 'Kode salah atau kadaluarsa');
        }

        // =====================
        // LOGIN USER BIASA
        // =====================
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return Auth::user()->role == 'admin'
                ? redirect('/admin')
                : redirect('/');
        }

        return back()->with('error', 'Email atau password salah');
    }

    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Anda berhasil log out');
    }
}
