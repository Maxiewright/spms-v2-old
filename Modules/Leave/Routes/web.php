<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use Modules\Leave\Http\Controllers\DashboardController;
use Modules\Leave\Http\Controllers\TestingController;
use Modules\Leave\Http\Livewire\Entitlement\ShowEntitlement;


Route::group(['prefix' => 'leave', 'middleware' => 'auth'], function (){
    //    Dashboard
    Route::get('/', [DashboardController::class, 'dashboard'])->name('leave.dashboard');
    Route::get('all', [DashboardController::class, 'index'])->name('leave.all');
    Route::get('adjustments', [DashboardController::class, 'adjustment'])->name('leave.adjustments');

//    Leave
    Route::resource('leave', 'LeaveController');

//    Entitlement
    Route::get('entitlement/{serviceperson}', ShowEntitlement::class)->name('leave.entitlement');
//    Route::resource('entitlement', 'LeaveEntitlementController');


//    Test
    Route::get('test',[TestingController::class, 'index'])->name('test');
});
//Route::prefix('leave')->group(function() {
//
//});

