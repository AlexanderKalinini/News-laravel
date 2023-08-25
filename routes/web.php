<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;


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

Route::get('/', [Controller::class, 'index'])->name('home');
Route::get('/post/{post}', [AuthController::class, 'showPost'])->name('showPost');

Route::get('/showContactForm', [AuthController::class, 'showContactForm'])->name('showContactForm');
Route::post('/sendContactForm', [AuthController::class, 'sendContactForm'])->name('sendContactForm');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/sendComment/{post}', [AuthController::class, 'sendComment'])->name('sendComment');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login_process', [AuthController::class, 'login'])->name('log_proc');

    Route::get('/reg', [AuthController::class, 'showRegistration'])
        ->name('reg');
    Route::post('/reg_process', [AuthController::class, 'registration'])
        ->name('reg_process');

    Route::get('/forgot', [AuthController::class, 'showForgotPassword'])
        ->name('forgot');
    Route::post('/forgot_proc', [AuthController::class, 'forgotProcess'])
        ->name('forgot_proc');
});
