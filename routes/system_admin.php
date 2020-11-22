<?php

use Illuminate\Support\Facades\Route;


//    Metadata
    Route::group(['prefix' => 'metadata'], function (){
        /** Record Card Metadata */
        Route::group(['prefix' => 'record_card'], function(){
            Route::view('basic_info', 'system_administration.metadata.record_card.basic_info')->name('metadata.record_card.basic_info');
            Route::view('contact', 'system_administration.metadata.record_card.contact')->name('metadata.record_card.contact');
            Route::view('extracurricular', 'system_administration.metadata.record_card.extracurricular')->name('metadata.record_card.extracurricular');
            Route::view('identification', 'system_administration.metadata.record_card.identification')->name('metadata.record_card.identification');
            Route::view('bio_data', 'system_administration.metadata.record_card.bio_data')->name('metadata.record_card.bio_data');
            Route::view('medical_history', 'system_administration.metadata.record_card.medical_history')->name('metadata.record_card.medical_history');
            Route::view('service_data', 'system_administration.metadata.record_card.service_data')->name('metadata.record_card.service_data');
        });

    });


//   Security
    Route::group(['namespace'=> 'SystemAdministration'], function () {
        /** Roles and permissions */

        Route::group(['prefix' => 'security','namespace' => 'Security'], function (){

            Route::view('permissions', 'system_administration.security.permissions')->name('security.permissions');
            Route::view('roles', 'system_administration.security.roles')->name('security.roles');
            Route::view('users', 'system_administration.security.users')->name('security.users');

//            Route::resource('permissions', 'PermissionController');
//            Route::resource('roles', 'RoleController');

            Route::resource('activity_logs', 'ActivityLogController');
        });

    });


