<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordResetController;
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
    Route::post('/login', [LoginController::class, 'store'])
        ->middleware('throttle:6,1')->name('login.store');
});

// Logout Route
Route::prefix(LaravelLocalization::setLocale() . '/auth')
    ->middleware(['auth', 'localeCookieRedirect', 'localizationRedirect'])
    ->post('/logout', [LoginController::class, 'logout'])
    ->name('auth.logout');

// Password Reset Routes
Route::prefix(LaravelLocalization::setLocale() . '/auth')
    ->middleware(['guest', 'localeCookieRedirect', 'localizationRedirect'])
    ->name('password.')->group(function () {
    Route::get('/forgot-password', [PasswordResetController::class, 'showForgot'])->name('request');
    Route::post('/forgot-password', [PasswordResetController::class, 'email'])
        ->middleware('throttle:6,1')->name('email');

    Route::get('/reset-password/{token}', [PasswordResetController::class, 'showReset'])->name('reset');
    Route::post('/reset-password', [PasswordResetController::class, 'update'])->name('update');
});
