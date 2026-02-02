<?php

namespace App\Services;

use App\Http\Requests\Auth\PasswordResetRequest;
use App\Models\User;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class PasswordResetService
{
    public function sendResetLink(Request $request): void
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::ResetLinkSent) {
            ToastMagic::success(__('toast.title.success.text'), __($status));
        } else {
            ToastMagic::error(__('toast.title.error.text'), __($status));
        }
    }

    public function resetPassword(PasswordResetRequest $request): RedirectResponse
    {
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PasswordReset) {
            ToastMagic::success(__('toast.title.success.text'), __($status));

            return redirect()->route('auth.login.show');
        } else {
            ToastMagic::error(__('toast.title.error.text'), __($status));

            return back();
        }
    }
}
