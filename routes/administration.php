<?php

use Illuminate\Support\Facades\Route;


//Approval System
Route::view('modifications','administration.approval_system.modifications')
    ->name('modifications');

Route::view('creations','administration.approval_system.creations')
    ->name('creations');
