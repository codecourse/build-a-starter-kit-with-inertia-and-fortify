<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterIndexController extends Controller
{
    public function __invoke()
    {
        return inertia()->modal('Auth/Register')
            ->baseRoute('home');
    }
}
