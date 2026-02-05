<?php

use App\Enums\StorageDisk;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

if (! function_exists("localizeRoute")) {
    /**
     * Generate a localized URL for the given route.
     *
     * @param  string  $name
     * @param  array  $parameters
     * @return string Localized URL.
     */
    function localizeRoute(string $name, mixed $parameters = []): string
    {
        return LaravelLocalization::localizeUrl(
            route($name, $parameters, false)
        );
    }
}

if (! function_exists("updateOrCreateFile")) {
    /**
     * Update a file on the specified disk or create it if it doesn't exist.
     *
     * @param  StorageDisk  $disk
     * @param  ?UploadedFile  $file
     * @param  ?string  $oldPath
     * @return string|false The path of the newly stored file. (false if no file was provided)
     */
    function updateOrCreateFile(StorageDisk $disk, ?UploadedFile $file, ?string $oldPath = null): string|false
    {
        if (!$file) return false;

        $storage = Storage::disk($disk);
        $oldPath = Str::after($oldPath, 'storage/'. $disk->value . '/');

        if ($oldPath && $storage->exists($oldPath)) {
            $storage->delete($oldPath);
        }

        return $storage->putFile('', $file);
    }
}
