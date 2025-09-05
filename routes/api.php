<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\ResetPasswordController;
use App\Http\Controllers\Api\Admin\Auth\AuthController;
use App\Http\Controllers\Api\Admin\Auth\ProfileController;


/*   ==================== Admin Login Route ==================== */

Route::controller(AuthController::class)->middleware('guest')->prefix('admin/auth')->group(function () {
    Route::post('login', 'login');
});
/*   ==================== Admin Login Route ==================== */


/*   ----------------------------------------- Admin Protected Route -----------------------------------------  */


/* ==================== Logout and return auth user ==================== */
Route::controller(AuthController::class)->middleware('auth:sanctum')->prefix('admin/auth')->group(function () {
    Route::post('logout', 'logout');
});
/* ==================== Logout and return auth user ==================== */


/* ==================== Profile Routes ==================== */
Route::controller(ProfileController::class)->middleware('auth:sanctum')->prefix('admin/profile')->group(function () {
    Route::get('index', 'index');
    Route::put('/update', 'update');
    Route::put('change-password', 'changePassword');
});
/* ==================== Profile Routes ==================== */


/*   ----------------------------------------- Admin Protected Route -----------------------------------------  */


/* ==================== Admin forget Password ==================== */
Route::controller(ResetPasswordController::class)->middleware('guest')->prefix('admin/auth')->group(function () {
    Route::post('forget-password', 'forgotPassword');
    Route::post('verify-otp', 'verifyOtp');
    Route::post('reset-password', 'resetPassword');
});
/* ==================== Admin forget Password ==================== */
