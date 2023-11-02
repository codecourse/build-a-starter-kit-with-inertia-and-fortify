<?php

use App\Http\Controllers\Account\AccountIndexController;
use App\Http\Controllers\Account\SecurityIndexController;
use App\Http\Controllers\Auth\LoginIndexController;
use App\Http\Controllers\Auth\RecoverIndexController;
use App\Http\Controllers\Auth\RegisterIndexController;
use App\Http\Controllers\Auth\ResetIndexController;
use App\Http\Controllers\Auth\TwoFactorIndexController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Symfony\Contracts\Service\ResetInterface;

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
Route::get('/dashboard', DashboardController::class)->name('dashboard')->middleware('verified');
// ->middleware(RequirePassword::using(null, 1));

if (Features::enabled(Features::registration())) {
    Route::get('/auth/register', RegisterIndexController::class)->name('auth.register');
}

Route::get('/auth/login', LoginIndexController::class)->name('auth.login');

if (Features::enabled(Features::updateProfileInformation())) {
    Route::get('/account', AccountIndexController::class)->name('account.index');
}

if (Features::hasSecurityFeatures()) {
    Route::get('/account/security', SecurityIndexController::class)->name('account.security.index');
}

if (Features::enabled(Features::twoFactorAuthentication())) {
    Route::get('/auth/two-factor', TwoFactorIndexController::class)->name('auth.two-factor');
}

if (Features::enabled(Features::resetPasswords())) {
    Route::get('/auth/recover', RecoverIndexController::class)->name('auth.recover');
    Route::get('/auth/reset', ResetIndexController::class)->name('password.reset');
}

require __DIR__ . '/fortify.php';
