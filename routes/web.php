<?php


use App\Actions\Fortify\ChangePassword;
use App\Http\Controllers\Notification\NotificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DarkModeController;

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

Route::get('/', function () {
    return view('landing.index');
});

//Display the password change form
Route::view('change-password', 'auth.change-password')
    ->name('password.change')
    ->middleware('verified');

//Change the password
Route::post('changePassword',[ChangePassword::class, 'changePassword'])
    ->name('change.password');

Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');

Route::view('medical/basic_medical', 'medical.basic_medical')
    ->name('basic.medical');

//    Notification
Route::get('user/{id}', [NotificationController::class, 'readAll'])->name('notification.readAll');
Route::get('user/{id}', [NotificationController::class, 'destroy'])->name('notification.readAll');

