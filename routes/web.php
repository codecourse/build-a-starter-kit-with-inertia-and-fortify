<?php

use App\Http\Controllers\Auth\LoginIndexController;
use App\Http\Controllers\Auth\RegisterIndexController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
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

Route::get('/', HomeController::class)->name('home');
Route::get('/dashboard', DashboardController::class)->name('dashboard');

Route::get('/auth/register', RegisterIndexController::class)->name('auth.register');
Route::get('/auth/login', LoginIndexController::class)->name('auth.login');
