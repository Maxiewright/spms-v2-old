<?php

use App\Http\Controllers\Manpower\ManpowerController;
use App\Http\Controllers\Serviceperson\DashboardController;
use App\Http\Controllers\Serviceperson\ServicepersonController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DarkModeController;

/*
|--------------------------------------------------------------------------
| Serviceperson Routes
|--------------------------------------------------------------------------
|
| Here all route directly relating to servicepeople is registered.
|
*/

Route::middleware('auth')->group(function() {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('parade_state', [ManpowerController::class, 'paradeState'])->name('parade_state');
    Route::get('servicepeople', [ServicepersonController::class, 'index'])->name('servicepeople');
});
