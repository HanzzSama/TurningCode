<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('index');
});

Route::get('/', function () {
    return view('index', ['page' => 'home']);
});

Route::get('/material', function () {
    return view('index', ['page' => 'material']);
});

Route::get('/admin', function () {
    return view('index', ['page' => 'admin']);
});

Route::get('/login',[AuthController::class,'showLogin']);
Route::get('/register',[AuthController::class,'showRegister']);

Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);

Route::post('/logout',[AuthController::class,'logout']);
