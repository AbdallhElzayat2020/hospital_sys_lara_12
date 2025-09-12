<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\DoctorController;
use App\Http\Controllers\Api\Admin\SectionController;
use App\Http\Controllers\Api\Admin\Auth\AuthController;
use App\Http\Controllers\Api\Admin\Auth\ProfileController;
use App\Http\Controllers\Api\Admin\Services\SingleServiceController;
use App\Http\Controllers\Api\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Api\Admin\InsuranceController;

/*
|--------------------------------------------------------------------------
| Admin Authentication Routes
|--------------------------------------------------------------------------
|
| Routes for admin authentication such as login, logout,
| password reset, and profile management.
|
*/


/*
|--------------------------------------------------------------------------
| Admin Login (Guest Only)
|--------------------------------------------------------------------------
*/

Route::controller(AuthController::class)
    ->middleware('guest')
    ->prefix('admin/auth')
    ->group(function () {
        Route::post('login', 'login');
    });


/*
|--------------------------------------------------------------------------
| Admin Protected Routes (Require Sanctum Auth)
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Logout
    |--------------------------------------------------------------------------
    */
    Route::controller(AuthController::class)
        ->prefix('admin/auth')
        ->group(function () {
            Route::post('logout', 'logout');
        });

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */
    Route::controller(ProfileController::class)
        ->prefix('admin/profile')
        ->group(function () {
            Route::get('index', 'index');
            Route::put('update', 'update');
            Route::put('change-password', 'changePassword');
        });

    /*
   |--------------------------------------------------------------------------
   | Departments (Sections) Management
   |--------------------------------------------------------------------------
   */
    Route::apiResource('admin/sections', SectionController::class);
    Route::get('admin/sections-with-doctors', [SectionController::class, 'getSectionsWithDoctors']);

    /*
   |--------------------------------------------------------------------------
   | Doctors (Doctors) Management
   |--------------------------------------------------------------------------
   */
    Route::apiResource('admin/doctors', DoctorController::class);
    Route::post('admin/doctors/{id}/change-status', [DoctorController::class, 'changeStatus']);
    Route::get('admin/doctors/sections/{section_id}', [DoctorController::class, 'getDoctorsBySection']);

    /*
   |--------------------------------------------------------------------------
   | Services (Services) Management
   |--------------------------------------------------------------------------
   */
    Route::apiResource('admin/services', SingleServiceController::class);

    /*
  |--------------------------------------------------------------------------
  | Insurances  (Insurances) Management
  |--------------------------------------------------------------------------
  */
    Route::apiResource('admin/insurances', InsuranceController::class);


});


/*
|--------------------------------------------------------------------------
| Admin Password Reset (Guest Only)
|--------------------------------------------------------------------------
*/
Route::controller(ResetPasswordController::class)
    ->middleware('guest')
    ->prefix('admin/auth')
    ->group(function () {
        Route::post('forget-password', 'forgotPassword');
        Route::post('verify-otp', 'verifyOtp');
        Route::post('reset-password', 'resetPassword');
    });
