<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordResetController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', HomePageController::class)->name('home');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


});


Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [UserController::class, 'create']);

    Route::post('/register', [UserController::class, 'store'])->name('register');

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'auth'])->name('auth');

    Route::get('/forgotten-password', [PasswordResetController::class, 'request'])->name('forgotten.password');
    Route::post('/forgotten-password', [PasswordResetController::class, 'sendResetPasswordEmail'])->name('password.email');

    Route::get('/password-reset', [PasswordResetController::class, 'reset'])->name('password.reset');
    Route::post('/password-reset', [PasswordResetController::class, 'update'])->name('password.update');


});
