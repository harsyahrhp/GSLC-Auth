<?php

use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

// Route::get('auth/google', [GoogleController::class, 'logingoogle'])->name('goole.login');
// Route::get('auth/google/callback', [GoogleController::class, 'callbackgoogle'])->name('goole.login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login/google', [GoogleController::class, 'logingoogle']);
Route::get('/login/google/callback', [GoogleController::class, 'callbackgoogle']);
