<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ config('app.name') }}</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @include('partials.links')
</head>

<body class="flex flex-col min-h-full">
    <x-navbar />

    @session('message')
        <div class="flash-message w-full bg-green-700 py-2 px-4 my-4 mx-2 text-lg text-white">
            {{ session('message') }}
        </div>
    @endsession

    @session('error')
        <div class="flash-message w-full bg-red-700 py-2 px-4 my-4 mx-2 text-lg text-white">
            {{ session('error') }}
        </div>
    @endsession

    @yield('content')

    <x-footer />

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const flashMessage = document.querySelectorAll(".flash-message");
            flashMessage.forEach((message) => {
                if (message) {

                    setTimeout(() => {
                        message.style.transition = "opacity 0.5s ease";
                        message.style.opacity = "0";
                        setTimeout(() => message.remove(), 500);
                    }, 5000);
                }
            });
        });
    </script>
    @include('partials.jslinks')

    {{-- @livewireScripts --}}
</body>

</html>
