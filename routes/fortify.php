<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\ConfirmablePasswordController;
use Laravel\Fortify\RoutePath;

Route::get(RoutePath::for('password.confirm', '/user/confirm-password'), [ConfirmablePasswordController::class, 'show'])
            ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')]);
