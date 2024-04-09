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

