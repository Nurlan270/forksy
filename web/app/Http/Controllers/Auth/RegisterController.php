<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthenticationService;

class RegisterController extends Controller
{
    public function __construct(
        protected AuthenticationService $service
    ) {}

    public function show()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        return $this->service->register($request);
    }
}
