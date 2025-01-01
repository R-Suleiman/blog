@extends('layouts.app')
@section('title', 'Login')
@section('content')

    <section class="w-full p-2 md:p-8">
        <div class="w-11/12 md:w-9/12 mx-auto border border-green-400 my-8 p-2 md:p-4 flex flex-col items-center">
            <h3 class="text-3xl text-green-400 font-semibold mb-4">Welcome back!</h3>

            <span class="text-3xl my-2">Login</span>
            <i class="fa fa-sign-in text-2xl text-green-400 bg-gray-800 rounded-full py-3 px-4"></i>

            <form action="{{ route('login.store') }}" method="POST" class="w-full md:w-2/3 p-2 my-4">
                @csrf
                <div class="w-full p-2">
                    @error('email')
                    <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                @enderror

                    <label for="email" class="text-xl mb-2 text-gray-700">Email:</label>
                    <input type="email" name="email"  value="{{ old('email') }}" class="w-full border border-green-400 text-lg p-2 outline-none">
                </div>
                <div class="w-full p-2">
                    <label for="password" class="text-xl mb-2 text-gray-700">Password:</label>
                    <input type="password" name="password" class="w-full border border-green-400 text-lg p-2 outline-none">
                </div>

                <div class="w-full p-2">
                    <button class="w-full text-center p-2 text-gray-800 bg-green-400 text-lg my-2 hover:bg-gray-800 hover:text-white">Login</button>
                </div>
            </form>

            <div class="mb-2">
                <span class="text-green-700 hover:underline"><a href="{{ route('forgot-password') }}">Forgot Password</a></span>
            </div>

            <div class="text-lg">
                <span class="text-gray-700 mx-2">Don't have an account?</span> <span class="text-green-700 hover:underline"><a href="{{ route('register.create') }}">Register</a></span>
            </div>
        </div>
    </section>
@endsection
