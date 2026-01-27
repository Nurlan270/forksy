<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset("favicon.png") }}" type="image/x-icon">
    <title>{{ $title ?? config("app.name") }}</title>
    @vite(["resources/css/app.css", "resources/js/app.js"])
    {!! ToastMagic::styles() !!}
</head>
<body class="min-h-screen flex flex-col bg-gray-50">
    {{ $slot }}

    {!! ToastMagic::scripts() !!}
</body>
</html>
