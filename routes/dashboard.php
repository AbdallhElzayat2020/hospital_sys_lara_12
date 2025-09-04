<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Admin\DashboardController;
use App\Http\Controllers\Dashboard\Admin\AuthController;


Route::post('login-admin', [AuthController::class, 'store'])->name('login.admin');


Route::middleware(['auth:admin'])->group(function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('admin-logout', [AuthController::class, 'destroy'])->name('admin.logout');
});
