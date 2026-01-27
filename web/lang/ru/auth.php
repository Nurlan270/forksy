<?php

return [
    'login' => [
        'title' => 'С возвращением',
        'subtitle' => 'Войдите, чтобы продолжить делиться едой.',
        'remember' => 'Запомнить меня',
        'forgot' => 'Забыли пароль?',
        'no_account' => 'Нет аккаунта?',
    ],

    'register' => [
        'title' => 'Создание аккаунта',
        'subtitle' => 'Присоединяйтесь к Forksy и делитесь едой.',
        'have_account' => 'Уже есть аккаунт?',
    ],

    'fields' => [
        'name' => 'Имя',
        'email' => 'Электронная почта',
        'password' => 'Пароль',
        'password_confirmation' => 'Подтверждение пароля',
    ],

    'placeholders' => [
        'name' => 'Иван Иванов',
        'email' => 'you@example.com',
        'password' => '••••••••',
    ],

    'actions' => [
        'register' => 'Создать аккаунт',
        'login' => 'Войти',
    ],

    // Laravel's default auth language translations
    'failed'   => 'Неверное имя пользователя или пароль.',
    'password' => 'Некорректный пароль.',
    'throttle' => 'Слишком много попыток входа. Пожалуйста, попробуйте ещё раз через :seconds секунд.',
];
