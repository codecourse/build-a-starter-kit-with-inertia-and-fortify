<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResetIndexController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function __invoke(Request $request)
    {
        return inertia()->modal('Auth/Reset')
            ->with([
                'token' => $request->token,
                'email' => $request->email,
            ])
            ->baseRoute('home');
    }
}
