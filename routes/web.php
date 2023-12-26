<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

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

Route::group(["prefix" => "{locale}"], function () {
    // Home
    Route::get('/', [HomeController::class, 'index'])->name('index');

    // Authentication
    Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
        Route::get('/register', [AuthenticationController::class, 'register'])->name('register');
        Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
        Route::get('/forgot-password', [AuthenticationController::class, 'forgotPassword'])->name('forgot-password');
        Route::get('/reset-password/{token}', [AuthenticationController::class, 'resetPassword'])->name('reset-password');
    });

    // Videos
    Route::get('/video/{id}', [VideoController::class, 'show'])->name('videos.show');

    require __DIR__ . '/api.php';
});
