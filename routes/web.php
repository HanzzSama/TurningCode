<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainMateriController;
use App\Http\Controllers\SubMateriController;
use Illuminate\Support\Facades\Route;

/* =====================
   PUBLIC ROUTE
===================== */

Route::get('/login',[AuthController::class,'showLogin'])->name('login');
Route::get('/register',[AuthController::class,'showRegister']);

Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);
Route::post('/send-admin-otp', [AuthController::class,'send'])->name('send.admin.otp');


/* =====================
   USER AREA
===================== */

Route::middleware(['auth','role:user'])->group(function(){

    Route::get('/', [MainMateriController::class,'index']);

    Route::get('/materi/{id}', [MainMateriController::class,'show']);

    Route::get('/submateri/{id}', [SubMateriController::class,'show']);

    Route::get('/detail/{id}', [SubMateriController::class,'detail']);

});


/* =====================
   ADMIN AREA
===================== */

Route::middleware(['auth','role:admin','desktop'])->group(function(){

    Route::get('/admin', function () {
        return view('index', ['page' => 'admin']);
    });

});


/* =====================
   LOGOUT
===================== */

Route::post('/logout',[AuthController::class,'logout'])->middleware('auth');
