<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

require_once __DIR__ . "/auth.php";

Route::prefix(LaravelLocalization::setLocale())
    ->middleware(['localeCookieRedirect', 'localizationRedirect'])
    ->group(function () {
    Route::view('/', 'welcome')->name('welcome');
});
