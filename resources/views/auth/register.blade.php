@extends('layouts.app')
@section('title', 'Register')
@section('content')

    <section class="w-full p-2 md:p-8">
        <div class="w-11/12 md:w-9/12 mx-auto border border-green-400 my-8 p-2 md:p-4 flex flex-col items-center">
            <h3 class="text-3xl text-green-400 font-semibold mb-4">Create an account</h3>

            <span class="text-3xl my-2">Register</span>
            <i class="fa fa-user text-2xl text-green-400 bg-gray-800 rounded-full py-3 px-4"></i>

            <form action="{{ route('register.store') }}" method="POST" class="w-full md:w-2/3 p-2 my-4">
                @csrf
                <div class="w-full p-2">
                    <label for="first_name" class="text-xl mb-2 text-gray-700">First Name:</label>
                    <input type="text" name="first_name"  value="{{ old('first_name') }}" class="w-full border border-green-400 text-lg p-2 outline-none">

                    @error('first_name')
                    <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                @enderror
                </div>
                <div class="w-full p-2">
                    <label for="last_name" class="text-xl mb-2 text-gray-700">Last Name:</label>
                    <input type="text" name="last_name"  value="{{ old('last_name') }}" class="w-full border border-green-400 text-lg p-2 outline-none">

                    @error('last_name')
                    <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                @enderror
                </div>
                <div class="w-full p-2">
                    <label for="email" class="text-xl mb-2 text-gray-700">Email:</label>
                    <input type="email" name="email"  value="{{ old('email') }}" class="w-full border border-green-400 text-lg p-2 outline-none">

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
                    <label for="password_confirmation" class="text-xl mb-2 text-gray-700">Confirm Password:</label>
                    <input type="password" name="password_confirmation" class="w-full border border-green-400 text-lg p-2 outline-none">

                    @error('password_confirmation')
                    <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                @enderror
                </div>

                <div class="w-full p-2">
                    <button class="w-full text-center p-2 text-gray-800 bg-green-400 text-lg my-2 hover:bg-gray-800 hover:text-white">Register</button>
                </div>
            </form>

            <div class="text-lg">
                <span class="text-gray-700 mx-2">Already have an account?</span> <span class="text-green-700 hover:underline"><a href="{{ route('login') }}">Login</a></span>
            </div>
        </div>
    </section>
@endsection
