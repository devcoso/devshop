<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DevShop @yield('titulo')</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <h1 class="text-4xl font-extrabold">Devshop</h1>
        <a href="{{ route('login')}}">Inicia Sesión</a>
        <a href="{{ route('register')}}">Registrarse</a>
    </body>
</html>
