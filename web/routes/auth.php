<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::prefix(LaravelLocalization::setLocale() . '/auth')
    ->middleware(['guest', 'localeCookieRedirect', 'localizationRedirect'])
    ->name('auth.')->group(function () {
    // Registration Routes
    Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    // Login Routes
    Route::get('/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

// Logout Route
Route::prefix(LaravelLocalization::setLocale() . '/auth')
    ->middleware(['auth', 'localeCookieRedirect', 'localizationRedirect'])
    ->post('/logout', [LoginController::class, 'logout'])
    ->name('auth.logout');
