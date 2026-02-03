<?php

use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Validation\ValidationException;
use Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter;
use Mcamara\LaravelLocalization\Middleware\LocaleCookieRedirect;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'localizationRedirect' => LaravelLocalizationRedirectFilter::class,
            'localeCookieRedirect' => LocaleCookieRedirect::class,
        ]);

        $middleware->redirectGuestsTo(fn() =>
            localizeRoute('auth.login.show')
        );
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //  Show toast for validation errors
        $exceptions->render(function (ValidationException $e) {
            if (request()->expectsJson()) {
                return null;
            }

            foreach ($e->errors() as $msg) {
                ToastMagic::error(__('toast.title.error.validation'), $msg[0]);
            }
        });
    })->create();
