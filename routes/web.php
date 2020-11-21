<?php


use App\Actions\Fortify\ChangePassword;
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

Route::middleware(['auth:sanctum', 'verified', 'password.change'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

