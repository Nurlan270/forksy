<?php

namespace App\Services;

use App\Http\Requests\Settings\UpdateProfileRequest;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\RedirectResponse;

class SettingsService
{
    public function updateProfile(UpdateProfileRequest $request): RedirectResponse
    {
//        dd($request->all());

        $validated = $request->validated();

        auth()->user()->update($validated);

        ToastMagic::success(
            __('toast.title.success.settings.profile')
        );

        return back();
    }
}
