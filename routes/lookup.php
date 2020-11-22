<?php

use Illuminate\Support\Facades\Route;

    Route::get('getServiceperson', 'LookupController@getServiceperson')->name('getServiceperson');
    // Basic Info - Address
    Route::get('getCities/{id}', 'LookupController@getCities')->name('cities');
    // Education
    Route::get('getSubjects/{id}', 'LookupController@getSubjects')->name('subjects');
    Route::get('getSchools/{id}', 'LookupController@getSchools')->name('schools');
    Route::get('getCourseInstitutions/{id}', 'LookupController@getCourseInstitutions')->name('course_institutions');
    Route::get('getCourses/{id}', 'LookupController@getCourses')->name('courses');
    // Extracurricular
    Route::get('getSports/{id}', 'LookupController@getSports')->name('sports');
    Route::get('getHobbies/{id}', 'LookupController@getHobbies')->name('hobbies');

    // Medical
    Route::get('getAllergies/{id}', 'LookupController@getAllergies')->name('getAllergies');


    // ServiceData

    //Unit Data
    Route::get('getCompanies/{id}', 'LookupController@getCompanies')->name('companies');
    Route::get('getPlatoons/{id}', 'LookupController@getPlatoons')->name('platoons');
    Route::get('getSections/{id}', 'LookupController@getSections')->name('sections');
    // Serviceperson Job (Branch System)
    Route::get('getStreams/{id}','LookupController@getStreams')->name('getStreams');
    Route::get('getCareerPaths/{id}','LookupController@getCareerPaths')->name('getCareerPaths');
    Route::get('getSpecialities/{id}','LookupController@getSpecialities')->name('getSpecialities');
    Route::get('getJobs/{id}', 'LookupController@getJobs')->name('getJobs');

