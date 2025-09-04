<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;

Route::get('/dashboardaaaaa', [DashboardController::class, 'index'])->name('dashboard.index');
