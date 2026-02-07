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

    'forgot_password' => [
        'title' => 'Forgot your password?',
        'subtitle' => 'Enter your email and we’ll send you a reset link.',
        'actions' => [
            'send_link' => 'Send reset link',
            'back_to_login' => 'Back to login',
        ],
    ],

    'reset_password' => [
        'title' => 'Reset password',
        'subtitle' => 'Choose a new password for your account.',
        'actions' => [
            'reset' => 'Reset password',
        ],
    ],

    'fields' => [
        'name' => 'Name',
        'email' => 'Email',
        'password' => 'Password',
        'current_password' => 'Current password',
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
