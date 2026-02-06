<?php

use App\Http\Controllers\User\SettingsController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

require_once __DIR__ . "/auth.php";

Route::prefix(LaravelLocalization::setLocale())
    ->middleware(['localeCookieRedirect', 'localizationRedirect'])
    ->group(function () {
    // Welcome Page Route
    Route::view('/', 'welcome')->name('welcome');
});

Route::prefix(LaravelLocalization::setLocale())
    ->middleware(['auth', 'localeCookieRedirect', 'localizationRedirect'])
    ->name('user.')->group(function () {
    // Settings Routes
    Route::get('/settings', [SettingsController::class, 'show'])->name('settings');
    Route::patch('/settings/profile', [SettingsController::class, 'updateProfile'])
        ->name('settings.update.profile');
    Route::patch('/settings/password', [SettingsController::class, 'updatePassword'])
        ->name('settings.update.password');
    Route::delete('/settings/account', [SettingsController::class, 'deleteAccount'])
        ->name('settings.delete.account');
});
