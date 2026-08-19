<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->configureRateLimiting();

        Fortify::loginView(fn () => view('signin'));
        Fortify::registerView(fn () => view('signup'));
        Fortify::createUsersUsing(CreateNewUser::class);

        Fortify::authenticateUsing(function ($request) {
            $user = User::where('email', $request->email)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                return $user;
            }

            return null;
        });
    }

    /**
     * Configure the rate limiters referenced in config/fortify.php.
     */
    protected function configureRateLimiting(): void
    {
        $limiter = $this->app->make(\Illuminate\Cache\RateLimiter::class);

        $limiter->for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        $limiter->for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        $limiter->for('passkeys', function (Request $request) {
            return Limit::perMinute(5)->by($request->ip().'|'.$request->input('id'));
        });
    }
}
