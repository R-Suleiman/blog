<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ config('app.name') }}</title>
    @vite('resources/css/app.css')
    @include('partials.links')
</head>
<body>
    <x-navbar />
 @yield('content')

 @include('partials.jslinks')
</body>
</html>