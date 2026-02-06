<?php

use App\Enums\StorageDisk;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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
     * @param UploadedFile|File|null $file The file to be stored. If null, no action will be taken.
     * @param StorageDisk|string $disk The storage disk where the file should be stored.
     * @param string|null $oldFilename The filename of the old file to be deleted.
     * @return string|false The filename of the newly stored file. (false if no file was provided)
     */
    function updateOrCreateFile(
        UploadedFile|File|null $file,
        StorageDisk|string $disk = 'public',
        ?string $oldFilename = null
    ): string|false
    {
        if (!$file) return false;

        $storage = Storage::disk($disk);

        if ($oldFilename && $storage->exists($oldFilename)) {
            $storage->delete($oldFilename);
        }

        return $storage->putFile('/', $file);
    }
}

if (! function_exists("generateDefaultAvatar")) {
    /**
     * Generate an avatar based on the user's name.
     *
     * @param string $name The name of the user for whom the avatar is being generated.
     * @return string Avatar's filename.
     */
    function generateDefaultAvatar(string $name): string
    {
        $filename = 'default-' . Str::uuid() . '.png';

        app('avatar')->create($name)->save(
            storage_path('app/public/avatars/' . $filename)
        );

        return $filename;
    }
}
