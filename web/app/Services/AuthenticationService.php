<?php

namespace App\Services;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthenticationService
{
    public function register(RegisterRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $user = User::query()->create($validated);

        auth()->login($user);

        ToastMagic::success(
            __('toast.title.success.register'),
            __('toast.message.success.register')
        );

        return redirect()->intended(
            localizeRoute('welcome')
        );
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if (auth()->attempt($validated, $request->boolean('remember'))) {
            $request->session()->regenerate();

            ToastMagic::success(
                __('toast.title.success.login'),
                __('toast.message.success.login')
            );

            return redirect()->intended(
                localizeRoute('welcome')
            );
        }

        ToastMagic::error(
            __('toast.title.error.validation'),
            __('toast.message.error.login')
        );

        return back();
    }

    public function logout(Request $request): RedirectResponse
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        ToastMagic::info(
            __('toast.title.success.logout')
        );

        return redirect()->intended(
            localizeRoute('welcome')
        );
    }
}
