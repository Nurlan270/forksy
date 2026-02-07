<?php

namespace App\Services;

use App\Enums\StorageDisk;
use App\Http\Requests\Settings\UpdatePasswordRequest;
use App\Http\Requests\Settings\UpdateProfileRequest;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SettingsService
{
    public function updateProfile(UpdateProfileRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $user = auth()->user();

        // Handle avatar and banner updates.
        // If the user uploaded a new file, it will replace the old one.
        $newAvatar = updateOrCreateFile(
            $request->file('avatar'), StorageDisk::Avatars, $user->avatar);

        $newBanner = updateOrCreateFile(
            $request->file('banner'), StorageDisk::Banners, $user->banner);

        // If the user is changing their name, and they don't have custom avatar,
        // delete the old default avatar and generate a new one based on the new name.
        if (!$newAvatar &&
            $user->name !== $validated['name'] &&
            Str::contains($user->avatar, 'default-')
        ) {
            if (Storage::disk('avatars')->exists($user->avatar)) {
                Storage::disk('avatars')->delete($user->avatar);
            }

            $newAvatar = generateDefaultAvatar($validated['name']);
        }

        // Update the avatar and banner paths if new files were uploaded or generated.
        if ($newAvatar) $validated['avatar'] = $newAvatar;
        if ($newBanner) $validated['banner'] = $newBanner;

        $user->update($validated);

        ToastMagic::success(
            __('toast.title.success.settings.profile'));

        return back();
    }

    public function updatePassword(UpdatePasswordRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        auth()->user()->update([
            'password' => bcrypt($validated['password']),
        ]);

        ToastMagic::success(
            __('toast.title.success.settings.password'));

        return back();
    }

    public function deleteAccount(): RedirectResponse
    {
        auth()->user()->delete();

        ToastMagic::success(
            __('toast.title.success.settings.account'));

        return redirect()->route('welcome');
    }
}
