<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\PasswordResetRequest;
use App\Services\PasswordResetService;
use Illuminate\Http\Request;

class PasswordResetController extends Controller
{
    public function __construct(
        protected PasswordResetService $service
    ) {}

    public function showForgot()
    {
        return view('auth.password.forgot');
    }

    public function showReset(string $token)
    {
        return view('auth.password.reset', compact('token'));
    }

    public function email(Request $request)
    {
        $this->service->sendResetLink($request);

        return back();
    }

    public function update(PasswordResetRequest $request)
    {
        $this->service->resetPassword($request);
    }
}
