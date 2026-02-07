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

    'forgot_password' => [
        'title' => 'Забыли пароль?',
        'subtitle' => 'Введите электронную почту, и мы отправим ссылку для сброса пароля.',
        'actions' => [
            'send_link' => 'Отправить ссылку',
            'back_to_login' => 'Вернуться ко входу',
        ],
    ],

    'reset_password' => [
        'title' => 'Сброс пароля',
        'subtitle' => 'Придумайте новый пароль для вашего аккаунта.',
        'actions' => [
            'reset' => 'Сбросить пароль',
        ],
    ],

    'fields' => [
        'name' => 'Имя',
        'email' => 'Электронная почта',
        'password' => 'Пароль',
        'current_password' => 'Текущий пароль',
        'password_confirmation' => 'Подтверждение пароля',
    ],

    'placeholders' => [
        'name' => 'Иван Иванов',
        'email' => 'you@example.com',
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
