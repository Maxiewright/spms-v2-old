<?php

use App\Http\Controllers\Manpower\ManpowerController;
use App\Http\Controllers\Serviceperson\Contact\ServicepersonAddressController;
use App\Http\Controllers\Serviceperson\Contact\ServicepersonEmailAddressController;
use App\Http\Controllers\Serviceperson\Contact\ServicepersonPhoneNumberController;
use App\Http\Controllers\Serviceperson\DashboardController;
use App\Http\Controllers\Serviceperson\Dependent\DependentController;
use App\Http\Controllers\Serviceperson\EmergencyContact\EmergencyContactController;
use App\Http\Controllers\Serviceperson\Extracurricular\ServicepersonHobbyController;
use App\Http\Controllers\Serviceperson\Extracurricular\ServicepersonSportController;
use App\Http\Controllers\Serviceperson\Identification\DriversPermitController;
use App\Http\Controllers\Serviceperson\Identification\MilitaryIdCardController;
use App\Http\Controllers\Serviceperson\Identification\NationalIdCardController;
use App\Http\Controllers\Serviceperson\Identification\PassportController;
use App\Http\Controllers\Serviceperson\MedicalHistory\ServicepersonAllergyController;
use App\Http\Controllers\Serviceperson\MedicalHistory\ServicepersonHeightController;
use App\Http\Controllers\Serviceperson\MedicalHistory\ServicepersonMedicalConditionController;
use App\Http\Controllers\Serviceperson\MedicalHistory\ServicepersonVaccineController;
use App\Http\Controllers\Serviceperson\MedicalHistory\ServicepersonWeightController;
use App\Http\Controllers\Serviceperson\Qualification\ServicepersonCourseController;
use App\Http\Controllers\Serviceperson\Qualification\ServicepersonEducationController;
use App\Http\Controllers\Serviceperson\ServiceData\AwardController;
use App\Http\Controllers\Serviceperson\ServiceData\EnlistmentController;
use App\Http\Controllers\Serviceperson\ServiceData\JobAppointmentController;
use App\Http\Controllers\Serviceperson\ServiceData\PromotionController;
use App\Http\Controllers\Serviceperson\ServiceData\ReEngagementController;
use App\Http\Controllers\Serviceperson\ServiceData\UnitController;
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
//});


Route::resource('servicepeople', ServicepersonController::class)
    ->middleware('can:view-servicepeople');

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
    Route::resource('serviceperson_addresses', ServicepersonAddressController::class);
    Route::resource('serviceperson_phones', ServicepersonPhoneNumberController::class);
    Route::resource('serviceperson_emails', ServicepersonEmailAddressController::class);
});

// Identification Records
Route::group(['namespace' => 'Identification'], function () {
    Route::resource('national_id_cards', NationalIdCardController::class);
    Route::resource('military_id_cards', MilitaryIdCardController::class);
    Route::resource('passports', PassportController::class);
    Route::resource('drivers_permits', DriversPermitController::class);
});

// Service Data Records
Route::group(['namespace' => 'ServiceData'], function () {
    Route::resource('enlistments', EnlistmentController::class);
    Route::resource('awards', AwardController::class);
    Route::resource('promotions', PromotionController::class);

    Route::get('/promotion_edit/{id}/{date}/editPromotion', [PromotionController::class, 'editPromotion' ])
        ->name('edit.promotion');
    Route::get('/promotion_destroy/{id}/{date}/destroyPromotion', [PromotionController::class, 'destroyPromotion' ])
        ->name('destroy.promotion');

    Route::resource('job_appointments', JobAppointmentController::class);
    Route::resource('units', UnitController::class);
    Route::resource('re_engagements', ReEngagementController::class);
});
// Medical History Records
Route::group(['namespace' => 'MedicalHistory'], function () {
    Route::resource('biodata', 'BiodataController');

//    height
    Route::resource('serviceperson_heights', ServicepersonHeightController::class);
    Route::get('/height_destroy/{id}/{date}/destroyHeight', [ServicepersonHeightController::class, 'destroyHeight'])
        ->name('destroy.height');

//  weight
    Route::resource('serviceperson_weights', ServicepersonWeightController::class);

    Route::get('/weight_destroy/{id}/{date}/destroyWeight', [ServicepersonWeightController::class, 'destroyWeight'])
        ->name('destroy.weight');

//  Vaccine
    Route::resource('serviceperson_vaccines', ServicepersonVaccineController::class);
    Route::get('/vaccine_edit/{id}/{date}/editVaccine', [ServicepersonVaccineController::class, 'editVaccine'])
        ->name('edit.vaccine');

    Route::get('/vaccine_destroy/{id}/{date}/destroyVaccine', [ServicepersonVaccineController::class, 'destroyVaccine'])
        ->name('destroy.vaccine');

    Route::resource('serviceperson_allergies', ServicepersonAllergyController::class);
    Route::resource('serviceperson_conditions', ServicepersonMedicalConditionController::class);
});
// Qualifications Records
Route::group(['namespace' => 'Qualification'], function () {
    Route::resource('serviceperson_education', ServicepersonEducationController::class);
    Route::resource('serviceperson_courses', ServicepersonCourseController::class);
});
// Dependents

Route::resource('dependents', DependentController::class);

// Extracurricular Records
Route::group(['namespace' => 'Extracurricular'], function () {
    Route::resource('serviceperson_sports', ServicepersonSportController::class);
    Route::resource('serviceperson_hobbies', ServicepersonHobbyController::class);
});

// Emergency Contact
Route::resource('emergency_contacts', EmergencyContactController::class);
