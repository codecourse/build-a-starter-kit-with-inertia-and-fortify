<?php

namespace App\Providers;

use App\Actions\Contracts\UpdatesUserProfilePhoto;
use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Actions\Fortify\UpdateUserProfilePhoto;
use App\Http\Responses\EmailVerificationNotificationSentResponse;
use App\Http\Responses\LoginResponse;
use App\Http\Responses\PasswordConfirmedResponse;
use App\Http\Responses\PasswordResetResponse;
use App\Http\Responses\PasswordUpdateResponse;
use App\Http\Responses\ProfileInformationUpdatedResponse;
use App\Http\Responses\SuccessfulPasswordResetLinkRequestResponse;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            \Laravel\Fortify\Contracts\LoginResponse::class,
            LoginResponse::class
        );

        $this->app->singleton(
            \Laravel\Fortify\Contracts\ProfileInformationUpdatedResponse::class,
            ProfileInformationUpdatedResponse::class
        );

        $this->app->singleton(
            \Laravel\Fortify\Contracts\PasswordUpdateResponse::class,
            PasswordUpdateResponse::class
        );

        $this->app->singleton(
            \Laravel\Fortify\Contracts\PasswordConfirmedResponse::class,
            PasswordConfirmedResponse::class
        );

        $this->app->singleton(
            \Laravel\Fortify\Contracts\EmailVerificationNotificationSentResponse::class,
            EmailVerificationNotificationSentResponse::class
        );

        $this->app->singleton(
            \Laravel\Fortify\Contracts\SuccessfulPasswordResetLinkRequestResponse::class,
            SuccessfulPasswordResetLinkRequestResponse::class
        );

        $this->app->singleton(
            \Laravel\Fortify\Contracts\PasswordResetResponse::class,
            PasswordResetResponse::class
        );

        $this->app->singleton(
            UpdatesUserProfilePhoto::class,
            UpdateUserProfilePhoto::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        Fortify::verifyEmailView(function () {
            return inertia()->modal('Auth/VerifyEmail')
                ->baseRoute('home');
        });

        Fortify::confirmPasswordView(function () {
            return inertia()->modal('Auth/ConfirmPassword')
                ->baseRoute('home');
        });

        Fortify::twoFactorChallengeView(function () {
            return inertia()->modal('Auth/TwoFactorChallenge')
                ->baseRoute('home');
        });
    }
}
