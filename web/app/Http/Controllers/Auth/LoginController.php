<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
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

    public function logout(Request $request)
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
