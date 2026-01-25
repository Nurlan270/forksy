<?php

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

if (! function_exists("localizeRoute")) {
    /**
     * Generate a localized URL for the given route.
     *
     * @param  string  $name
     * @param  array  $parameters
     * @param  bool  $absolute
     * @return string
     */
    function localizeRoute(string $name, mixed $parameters = []): string
    {
        return LaravelLocalization::localizeUrl(
            route($name, $parameters, false)
        );
    }
}
