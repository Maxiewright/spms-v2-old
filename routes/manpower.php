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

Route::get('dashboard', [ManpowerController::class, 'index'])
    ->name('manpower.dashboard');

/**
 * Vacancies
 */

Route::group(['prefix' => 'vacancies'], function () {

    Route::get('branch', [ManpowerController::class, 'branch'])
        ->name('manpower.vacancies.branch');

    Route::get('stream', [ManpowerController::class, 'stream'])
        ->name('manpower.vacancies.stream');

});

/**
 * Manpower Reports
 */
Route::group(['prefix' => 'reports'], function () {
    Route::view('crod', 'manpower.reports.crod')
        ->name('manpower.reports.crod');
});










