<?php

use App\Http\Controllers\AuthenticationController;
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
    Route::get('/', fn () => view('pages.home.index', ['title' => 'Home Page']))->name('index');
    Route::get('/auth/register', fn () => view('pages.auth.register', ['title' => 'Sign up']))->name('auth.register');
    Route::get('/auth/login', fn () => view('pages.auth.login', ['title' => 'Sign in']))->name('auth.login');
    Route::get('/video/{id}', fn () => view('pages.videos.show', ['title' => 'Video']))->name('videos.show');

    require __DIR__ . '/api.php';
});
