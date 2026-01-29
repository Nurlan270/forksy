<?php

return [
    'login' => [
        'title' => 'Welcome back',
        'subtitle' => 'Log in to continue sharing food.',
        'remember' => 'Remember me',
        'forgot' => 'Forgot password?',
        'no_account' => 'Don’t have an account?',
    ],

    'register' => [
        'title' => 'Create your account',
        'subtitle' => 'Join Forksy and start sharing food.',
        'have_account' => 'Already have an account?',
    ],

    'fields' => [
        'name' => 'Name',
        'email' => 'Email',
        'password' => 'Password',
        'password_confirmation' => 'Confirm password',
    ],

    'placeholders' => [
        'name' => 'John Doe',
        'email' => 'you@example.com',
    ],

    'actions' => [
        'register' => 'Create Account',
        'login' => 'Log in',
    ],

    // Laravel's default auth language translations
    'failed' => 'These credentials do not match our records.',
    'password' => 'The provided password is incorrect.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',
];
