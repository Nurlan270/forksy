<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\AuthenticationService;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(
        protected AuthenticationService $service
    ) {}

    public function show()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        return $this->service->login($request);
    }

    public function logout(Request $request)
    {
        return $this->service->logout($request);
    }
}
