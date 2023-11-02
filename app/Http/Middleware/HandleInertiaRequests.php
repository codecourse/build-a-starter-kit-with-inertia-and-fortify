<?php

namespace App\Http\Middleware;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Middleware;
use Laravel\Fortify\Features;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'config' => config()->get(['app.name']),
            'auth' => [
                'user' => $request->user() ? UserResource::make($request->user()) : null
            ],
            'features' => collect(config('fortify.features'))->mapWithKeys(fn ($key) => [$key => true])->merge([
                'security' => Features::hasSecurityFeatures(),
            ]),
            'toast' => session('toast'),
            'ziggy' => [
                'route_name' => Route::currentRouteName()
            ]
        ]);
    }
}
