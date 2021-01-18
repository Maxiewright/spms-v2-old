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

Route::prefix('documentation')->group(function() {
    Route::get('/', 'DocumentationController@index');

    // Getting Started
    Route::prefix('getting_started')->group(function(){
        Route::view('introduction', 'documentation::getting_started.introduction')
            ->name('getting_started.introduction');
        Route::view('system_access', 'documentation::getting_started.system-access')
            ->name('getting_started.system_access');
        Route::view('views', 'documentation::getting_started.views')
            ->name('getting_started.views');
        Route::view('adding_servicepeople', 'documentation::getting_started.adding-servicepeople')
            ->name('getting_started.adding_servicepeople');
    });

    // Personnel
    Route::prefix('personnel')->group(function(){
        Route::view('leave', 'documentation::personnel.leave')
            ->name('personnel.leave');
        Route::view('medical/medical_classification', 'documentation::personnel.medical.medical-classification')
            ->name('personnel.medical.medical_classification');
    });

    // Manpower
    Route::prefix('manpower')->group(function(){
        Route::view('career_management', 'documentation::manpower.career-management')
            ->name('manpower.career_management');
        Route::view('vacancies', 'documentation::manpower.vacancies')
            ->name('manpower.vacancies');
    });

    // Administration
    Route::prefix('administration')->group(function() {
        Route::view('approval', 'documentation::administration.approval')
            ->name('administration.approval');
    });

    // System Administration
    Route::prefix('system')->group(function() {
        Route::view('metadata/record_card', 'documentation::system.metadata.record_card')
            ->name('system.metadata.record_card');
        Route::view('security/access_control', 'documentation::system.security.access-control')
            ->name('system.security.access_control');
        Route::view('security/audit', 'documentation::system.security.audit')
            ->name('system.security.audit');
    });

});
