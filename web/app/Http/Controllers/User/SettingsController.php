<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\UpdatePasswordRequest;
use App\Http\Requests\Settings\UpdateProfileRequest;
use App\Services\SettingsService;

class SettingsController extends Controller
{
    public function __construct(
        protected SettingsService $service
    ) {}

    public function show()
    {
        return view('user.settings');
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        return $this->service->updateProfile($request);
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        return $this->service->updatePassword($request);
    }

    public function deleteAccount()
    {
        return $this->service->deleteAccount();
    }
}
