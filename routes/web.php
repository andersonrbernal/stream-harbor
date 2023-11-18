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
    Route::get('/', fn () => view('pages.home.index', ['title' => 'nigga']))->name('index');
    Route::get('/auth/register', fn () => view('pages.auth.register', ['title' => 'nigga']))->name('auth.register');
    Route::get('/auth/login', fn () => view('pages.auth.login', ['title' => 'nigga']))->name('auth.login');

    require __DIR__ . '/api.php';
});
