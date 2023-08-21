<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;


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

Route::middleware('guest:admin')->group(function () {
  Route::get('login', [AuthController::class, 'index'])->name('login');
  Route::post('login_process', [AuthController::class, 'login'])->name('login_process');
});

Route::middleware('auth:admin')->group(function () {
  Route::get('logout', [AuthController::class, 'logout'])->name('logout');
  Route::get('posts/users', [UserController::class, 'index'])->name('posts.users');
  Route::delete('posts/{user}/destroy', [UserController::class, 'destroy'])->name('users.destroy');
  Route::resource('posts', PostController::class);
});
