<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginIndexController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function __invoke()
    {
        return inertia()->modal('Auth/Login')
            ->baseRoute('home');
    }
}
