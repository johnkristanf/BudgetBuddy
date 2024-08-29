<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Auth/Login')->name('login.page');
Route::inertia('/dashboard', 'Dashboard')->name('dashboard');
Route::inertia('/transactions', 'Transactions')->name('transactions');