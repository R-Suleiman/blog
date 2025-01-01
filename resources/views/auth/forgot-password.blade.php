@extends('layouts.app')
@section('title', 'Passwords')
@section('content')

    <section class="w-full p-2 md:p-8 h-screen">
        <div class="w-11/12 md:w-9/12 mx-auto border border-green-400 my-8 p-2 md:p-4 flex flex-col items-center">
            <h3 class="text-3xl text-green-400 font-semibold mb-4">Forgot Password</h3>

            <form action="{{ route('forgot-password.store') }}" method="POST" class="w-full md:w-2/3 p-2 my-4">
                @csrf
                <div class="w-full p-2">
                    @if (session('error'))
                        <p class="text-lg text-red-600 my-2">{{ session('error') }}</p>
                    @endif
                    @if (session('success'))
                    <p class="text-lg text-green-800 my-2">{{ session('success') }}</p>
                    @endif



                    <label for="email" class="text-xl mb-2 text-gray-700">Email:</label>
                    <input type="email" name="email" placeholder="Email address"
                        class="w-full border border-green-400 text-lg p-2 outline-none">
                    @error('email')
                        <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full p-2">
                    <button
                        class="w-full text-center p-2 text-gray-800 bg-green-400 text-lg my-2 hover:bg-gray-800 hover:text-white">Send
                        reset link</button>
                </div>
            </form>
        </div>
    </section>

@endsection
