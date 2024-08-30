<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/auth/login');

Route::middleware('guest')->group(function () {
    Route::inertia('/auth/login', 'Auth/Login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});


Route::middleware('auth')->group(function () {
    Route::inertia('/dashboard', 'Dashboard')->name('dashboard');
    Route::inertia('/transactions', 'Transactions')->name('transactions');
    Route::inertia('/settings', 'Settings')->name('settings');
    Route::inertia('/notifications', 'Notifications')->name('notifications');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
});