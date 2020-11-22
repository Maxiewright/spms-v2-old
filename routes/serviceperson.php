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

//Route::middleware('auth')->group(function() {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('parade_state', [ManpowerController::class, 'paradeState'])->name('parade_state');
    Route::get('servicepeople', [ServicepersonController::class, 'index'])->name('servicepeople');
//});


//Route::resource('servicepeople', ServicepersonController::class)
//    ->middleware('can:view-servicepeople');

Route::put('serviceperson/status_update/', [ServicepersonController::class, 'updateStatus'])
    ->name('update.serviceperson.status');

Route::post('serviceperson/photo_update/{id}', [ServicepersonController::class, 'updatePhoto'])
    ->name('update.serviceperson.photo');

//    Add / Update Record Routes

//Create Serviceperson Route
Route::group(['middleware' => [], 'namespace' => 'Create'], function () {
    Route::multistep('/serviceperson/create', 'CreateServicepersonController')
        ->steps(10)
        ->name('serviceperson.create');
});


// Contact Information
Route::group(['namespace' => 'Contact'], function () {
    Route::resource('serviceperson_addresses', 'ServicepersonAddressController');
    Route::resource('serviceperson_phones', 'ServicepersonPhoneNumberController');
    Route::resource('serviceperson_emails', 'ServicepersonEmailAddressController');
});

// Identification Records
Route::group(['namespace' => 'Identification'], function () {
    Route::resource('national_id_cards', 'NationalIdCardController');
    Route::resource('military_id_cards', 'MilitaryIdCardController');
    Route::resource('passports', 'PassportController');
    Route::resource('drivers_permits', 'DriversPermitController');
});

// Service Data Records
Route::group(['namespace' => 'ServiceData'], function () {
    Route::resource('enlistments', 'EnlistmentController');
    Route::resource('awards', 'AwardController');
    Route::resource('promotions', 'PromotionController');

    Route::get('/promotion_edit/{id}/{date}/editPromotion', 'PromotionController@editPromotion')->name('edit.promotion');
    Route::get('/promotion_destroy/{id}/{date}/destroyPromotion', 'PromotionController@destroyPromotion')->name('destroy.promotion');

    Route::resource('job_appointments', 'JobAppointmentController');
    Route::resource('career_paths', 'ServicepersonCareerPathController');
    Route::resource('units', 'UnitController');
    Route::resource('re_engagements', 'ReEngagementController');
});
// Medical History Records
Route::group(['namespace' => 'MedicalHistory'], function () {
    Route::resource('biodata', 'BiodataController');
//    height
    Route::resource('serviceperson_heights', 'ServicepersonHeightController');
    Route::get('/height_destroy/{id}/{date}/destroyHeight', 'ServicepersonHeightController@destroyHeight')
        ->name('destroy.height');
//  weight
    Route::resource('serviceperson_weights', 'ServicepersonWeightController');

    Route::get('/weight_destroy/{id}/{date}/destroyWeight', 'ServicepersonWeightController@destroyWeight')
        ->name('destroy.weight');
//  Vaccine
    Route::resource('serviceperson_vaccines', 'ServicepersonVaccineController');
    Route::get('/vaccine_edit/{id}/{date}/editVaccine', 'ServicepersonVaccineController@editVaccine')
        ->name('edit.vaccine');
    Route::get('/vaccine_destroy/{id}/{date}/destroyVaccine', 'ServicepersonVaccineController@destroyVaccine')
        ->name('destroy.vaccine');

    Route::resource('serviceperson_allergies', 'ServicepersonAllergyController');
    Route::resource('serviceperson_conditions', 'ServicepersonMedicalConditionController');
});
// Qualifications Records
Route::group(['namespace' => 'Qualification'], function () {
    Route::resource('serviceperson_education', 'ServicepersonEducationController');
    Route::resource('serviceperson_courses', 'ServicepersonCourseController');
});
// Dependents

Route::resource('dependents', 'Dependent\DependentController');

// Extracurricular Records
Route::group(['namespace' => 'Extracurricular'], function () {
    Route::resource('serviceperson_sports', 'ServicepersonSportController');
    Route::resource('serviceperson_hobbies', 'ServicepersonHobbyController');
});
// Emergency Contact
Route::resource('emergency_contacts', 'EmergencyContact\EmergencyContactController');
