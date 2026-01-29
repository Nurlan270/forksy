<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Devrabiul\ToastMagic\Facades\ToastMagic;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
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
}
