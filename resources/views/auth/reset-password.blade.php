@extends('layouts.app')
@section('title', 'Reset Password')
@section('content')

    <section class="w-full p-2 md:p-8">
        <div class="w-11/12 md:w-9/12 mx-auto border border-green-400 my-8 p-2 md:p-4 flex flex-col items-center">
            <h3 class="text-3xl text-green-400 font-semibold mb-4">Reset Password</h3>

            <form action="{{ route('reset-password.store') }}" method="POST" class="w-full md:w-2/3 p-2 my-4">
                @csrf

                @if (session('error'))
                        <p class="text-lg text-red-600 my-2">{{ session('error') }}</p>
                    @endif
                    
                <input type="text" name="token" value="{{ $token }}" hidden>

                <div class="w-full p-2">
                    <label for="email" class="text-xl mb-2 text-gray-700">Email:</label>
                    <input type="email" name="email" class="w-full border border-green-400 text-lg p-2 outline-none">

                    @error('email')
                        <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full p-2">
                    <label for="password" class="text-xl mb-2 text-gray-700">Password:</label>
                    <input type="password" name="password" class="w-full border border-green-400 text-lg p-2 outline-none">

                    @error('password')
                        <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full p-2">
                    <label for="password" class="text-xl mb-2 text-gray-700">Confirm Password:</label>
                    <input type="password" name="password_confirmation"
                        class="w-full border border-green-400 text-lg p-2 outline-none">
                </div>

                <div class="w-full p-2">
                    <button
                        class="w-full text-center p-2 text-gray-800 bg-green-400 text-lg my-2 hover:bg-gray-800 hover:text-white">Reset
                        Password</button>
                </div>
            </form>
        </div>
    </section>
@endsection
