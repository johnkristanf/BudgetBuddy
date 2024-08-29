<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RateLimiter::for('login', function (Request $request) {
            $key = $request->input('email') ?: $request->ip();
            $tooManyAttempts = RateLimiter::tooManyAttempts($key, 3);

            if($tooManyAttempts){
                $retryAfter = RateLimiter::availableIn($key);

                return back()->withErrors([
                    'email' => 'Too Many Attempts. Please try again in ' . $retryAfter . ' seconds.'
                ])->onlyInput('email');
            }

            return Limit::perMinutes(20, 3)->by($key);
        });
    }
}
