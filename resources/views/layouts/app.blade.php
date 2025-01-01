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

    @session('message')
    <div id="flash-message" class="w-full bg-green-700 py-2 px-4 my-4 mx-2 text-lg text-white">
        {{ session('message') }}
    </div>
@endsession

 @yield('content')

    <x-footer />

    <script>

        document.addEventListener("DOMContentLoaded", function () {
            const flashMessage = document.getElementById("flash-message");
            if (flashMessage) {

                setTimeout(() => {
                    flashMessage.style.transition = "opacity 0.5s ease";
                    flashMessage.style.opacity = "0";
                    setTimeout(() => flashMessage.remove(), 500);
                }, 5000);
            }
        });
    </script>
 @include('partials.jslinks')
</body>
</html>
