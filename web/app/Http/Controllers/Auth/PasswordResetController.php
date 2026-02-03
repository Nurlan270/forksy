<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
        return $this->service->sendResetLink($request);
    }

    public function update(PasswordResetRequest $request)
    {
        return $this->service->resetPassword($request);
    }
}
