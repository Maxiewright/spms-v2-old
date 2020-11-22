<?php

use Illuminate\Support\Facades\Route;


//    Metadata
    Route::group(['prefix' => 'metadata'], function (){
        /** Record Card Metadata */
        Route::group(['prefix' => 'record_card'], function(){
            Route::view('basic_info', 'system_admin.metadata.basic_info')->name('metadata.basic_info');
            Route::view('contact', 'system_admin.metadata.contact')->name('metadata.contact');
            Route::view('extracurricular', 'system_admin.metadata.extracurricular')->name('metadata.extracurricular');
            Route::view('identification', 'system_admin.metadata.identification')->name('metadata.identification');
            Route::view('bio_data', 'system_admin.metadata.bio_data')->name('metadata.bio_data');
            Route::view('medical_history', 'system_admin.metadata.medical_history')->name('metadata.medical_history');
            Route::view('service_data', 'system_admin.metadata.service_data')->name('metadata.service_data');
        });

    });


//   Security
    Route::group(['namespace'=> 'SystemAdministration'], function () {
        /** Roles and permissions */

        Route::group(['prefix' => 'security','namespace' => 'Security'], function (){

            Route::view('permissions', 'system_admin.security.permissions')->name('security.permissions');
            Route::view('roles', 'system_admin.security.roles')->name('security.roles');
            Route::view('users', 'system_admin.security.users')->name('security.users');

//            Route::resource('permissions', 'PermissionController');
//            Route::resource('roles', 'RoleController');

            Route::resource('activity_logs', 'ActivityLogController');
        });

    });


