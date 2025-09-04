<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


/* frontend Routes  */
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']

    ], function () {

    Route::middleware(['auth:web'])->group(function () {

        Route::get('/dashboard', function () {
            return view('dashboard.user.pages.home');
        })->name('dashboard');
    });


    require __DIR__ . '/auth.php';
    require __DIR__ . '/dashboard.php';
});


