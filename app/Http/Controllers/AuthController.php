<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $key = $request->input('email') ?: $request->ip();
        $isAuthenticated = Auth::attempt($credentials, $request->remember);

        if($isAuthenticated){
            RateLimiter::clear($key);
            $request->session()->regenerate();

            return redirect()->intended('dashboard')->with('greet', 'Welcome to BudgetBuddy');
        }

        RateLimiter::hit($key);
        $tooManyAttempts = RateLimiter::tooManyAttempts($key, 3);

        if($tooManyAttempts){
            $retryAfter = RateLimiter::availableIn($key);

            return back()->withErrors([
                'email' => 'Too Many Attempts. Please try again in ' . $retryAfter . ' seconds.'
            ])->onlyInput('email');
        }


        return back()->withErrors([
            'email' => 'The provided credentials do not match our records'
        ])->onlyInput('email');
    }
}
