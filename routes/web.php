<?php

use App\Http\Controllers\AdminContributionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MainMateriController;
use App\Http\Controllers\SubMateriController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/* =====================
   PUBLIC ROUTE
===================== */

Route::get('/login',[AuthController::class,'showLogin'])->name('login');
Route::get('/register',[AuthController::class,'showRegister']);

Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);

/* =====================
   REALTIME ONLINE SYSTEM (WAJIB LOGIN)
===================== */
Route::get('/keep-alive', function () {
    return response()->json(['alive' => true]);
})->middleware('auth');
Route::middleware('auth')->get('/ping-online', function () {

    if(auth()->check()){
        auth()->user()->update([
            'last_seen' => now()
        ]);
    }

    return response()->json(['status' => 'ok']);
});

Route::middleware('auth')->get('/admin-status', function () {

    $admins = User::where('role','admin')->get();

    return response()->json(
        $admins->map(function($admin){
            return [
                'id' => $admin->id,
                'is_online' => $admin->last_seen
                    && \Carbon\Carbon::parse($admin->last_seen)->gte(now()->subMinutes(2))
            ];
        })
    );
});

Route::middleware('auth')->group(function(){

    Route::get('/chat', [ChatController::class,'getChat']);
    Route::post('/chat/send', [ChatController::class,'send']);

});

/* =====================
   USER AREA
===================== */

Route::middleware(['auth','role:user'])->group(function(){

    Route::get('/', [UserController::class,'index']);

    Route::get('/materi/{id}', [MainMateriController::class,'show']);
    Route::get('/submateri/{id}', [SubMateriController::class,'show']);
    Route::get('/belajar/{id}', [SubMateriController::class,'showDetail']);
    Route::get('/detail/{id}', [SubMateriController::class,'detail']);

});

/* =====================
   ADMIN AREA
===================== */

Route::middleware(['auth','role:admin','desktop'])->group(function(){

    Route::get('/admin', [AdminController::class,'index']);

    Route::post('/admin/contributor/save',
        [AdminContributionController::class,'saveContributor']
    );

});

/* =====================
   LOGOUT
===================== */

Route::post('/logout',[AuthController::class,'logout'])->middleware('auth');
