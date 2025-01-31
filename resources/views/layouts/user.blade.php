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

    <section class="w-full relative">
        <aside class="w-2/12 fixed left-0 top-0 bg-gray-800 border-r-2 border-green-400 h-full">
            <div class="w-2/3 mx-auto text-center my-4 p-4 flex flex-col items-center">
                <img src="{{ asset('img/user.avif') }}" alt="" class="w-2/3 rounded-full my-2">
                <h2 class="text-3xl text-green-400">{{ Auth::guard('web')->user()->first_name }}</h2>
            </div>

            <ul class="w-full p-2">

                <a href="{{ route('index') }}">
                    <li
                        class="w-full py-2 px-4 text-xl bg-green-400 text-gray-800 border-l-4 border-green-800 my-3 hover:bg-green-500">
                        Home</li>
                </a>
                <a href="{{ route('user.index') }}">
                    <li
                        class="w-full py-2 px-4 text-xl bg-green-400 text-gray-800 border-l-4 border-green-800 my-3 hover:bg-green-500">
                        Profile</li>
                </a>
                <a href="{{ route('user.change-password') }}">
                    <li
                        class="w-full py-2 px-4 text-xl bg-green-400 text-gray-800 border-l-4 border-green-800 my-3 hover:bg-green-500">
                        Change Password</li>
                </a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button
                        class="w-full py-2 px-4 text-xl bg-green-400 text-gray-800 border-l-4 border-green-800 hover:bg-green-500 text-left">
                        Logout</button>
                </form>
            </ul>

        </aside>
        <div class="w-10/12 float-right">
            <div class="w-full p-4 bg-gray-800">
                <h1 class="text-2xl text-white">Welcome, <span class="text-green-400">{{ Auth::guard('web')->user()->first_name }}</span></h1>
            </div>

            @session('message')
                <div class="flash-message w-full bg-green-700 py-2 px-4 my-4 mx-2 text-lg text-white">
                    {{ session('message') }}
                </div>
            @endsession

            @yield('content')
        </div>
    </section>

    {{-- @include('partials.jslinks') --}}
    <script>

        document.addEventListener("DOMContentLoaded", function () {
            const flashMessage = document.querySelectorAll("flash-message");
            flashMessage.forEach((message) => {
                if (message) {
    
                    setTimeout(() => {
                        message.style.transition = "opacity 0.5s ease";
                        message.style.opacity = "0";
                        setTimeout(() => message.remove(), 500);
                    }, 5000);
                }
            })
        });
    </script>
</body>

</html>
