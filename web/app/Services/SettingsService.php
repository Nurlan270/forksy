<?php

namespace App\Services;

use App\Enums\StorageDisk;
use App\Http\Requests\Settings\UpdateProfileRequest;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\RedirectResponse;

class SettingsService
{
    public function updateProfile(UpdateProfileRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $newAvatar = updateOrCreateFile(
            StorageDisk::Avatars, $request->file('avatar'), auth()->user()->avatar
        );

        $newBanner = updateOrCreateFile(
            StorageDisk::Banners, $request->file('banner'), auth()->user()->banner
        );

        if ($newAvatar) $validated['avatar'] = $newAvatar;
        if ($newBanner) $validated['banner'] = $newBanner;

        auth()->user()->update($validated);

        ToastMagic::success(
            __('toast.title.success.settings.profile')
        );

        return back();
    }
}
