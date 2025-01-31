@extends('layouts.app')
@section('title', 'Email Verification')
@section('content')

    <section class="w-full p-2 md:p-8 h-screen">
        <div class="w-11/12 md:w-9/12 mx-auto border border-green-400 my-8 p-2 md:p-4 flex flex-col items-center">
            <h2 class="text-xl font-semibold mb-4">Email Verification Required</h2>
            <p class="text-gray-600">
                A verification email has been sent to your email address. If you did not receive it, you can request a new
                one below.
            </p>

            @if (session('message'))
                <div class="mt-4 text-green-500">{{ session('message') }}</div>
            @endif

            <form method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <div class="my-2">
                    <label for="email" class="mb-2 text-gray-700">Enter your email to resend verification:</label>
                    <input type="email" name="email" class="w-full border border-green-400 text-lg p-2 outline-none"
                        placeholder="email">
                        
                    @error('email')
                        <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit"
                    class="w-full text-center p-2 text-gray-800 bg-green-400 text-lg my-2 hover:bg-gray-800 hover:text-white">Resend
                    Verification Email</button>
            </form>

        </div>
    </section>

@endsection
