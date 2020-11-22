<?php

use App\Http\Controllers\Manpower\ManpowerController;
use Illuminate\Support\Facades\Route;

/**
 * Career Management Module
 */
Route::group(['prefix' => 'career_management'], function () {
    Route::view('jobs', 'manpower.career_management.jobs')
        ->name('manpower.career_management.jobs');

    Route::view('qualifications', 'manpower.career_management.qualifications')
        ->name('manpower.career_management.qualifications');

    Route::view('career_management_system', 'manpower.career_management.career_management_system')
        ->name('manpower.career_management.career_management_system');

});

/**
 * Manpower Reports
 */
Route::group(['prefix' => 'reports'], function () {
    Route::view('crod', 'manpower.reports.crod')
        ->name('manpower.reports.crod');
});


Route::get('dashboard', [ManpowerController::class, 'index'])
    ->name('manpower.dashboard');

Route::get('branch', [ManpowerController::class, 'branch'])
    ->name('manpower.branch');

Route::get('stream', [ManpowerController::class, 'stream'])
    ->name('manpower.stream');


