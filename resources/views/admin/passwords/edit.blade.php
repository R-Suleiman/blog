@extends('layouts.admin')
@section('title', 'Change Password')
@section('content')

<section class="w-full p-2 md:p-8">
    <div class="w-11/12 md:w-9/12 mx-auto border border-green-400 my-8 p-2 md:p-4 flex flex-col items-center">
        <h3 class="text-3xl text-green-400 font-semibold mb-4">Change Password</h3>

        <form action="{{ route('admin.update-password') }}" method="POST" class="w-full md:w-2/3 p-2 my-4">
            @csrf

            <div class="w-full p-2">
                @if (session('error'))
                        <p class="text-lg text-red-600 my-2">{{ session('error') }}</p>
                    @endif

                <label for="current_password" class="text-xl mb-2 text-gray-700">Current Password:</label>
                <input type="password" name="current_password" class="w-full border border-green-400 text-lg p-2 outline-none">
            </div>

            <div class="w-full p-2">
                <label for="new_password" class="text-xl mb-2 text-gray-700">New Password:</label>
                <input type="password" name="new_password" class="w-full border border-green-400 text-lg p-2 outline-none">

                @error('new_password')
                    <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-full p-2">
                <label for="new_password_confirmation" class="text-xl mb-2 text-gray-700">Confirm New Password:</label>
                <input type="password" name="new_password_confirmation"
                    class="w-full border border-green-400 text-lg p-2 outline-none">
            </div>

            <div class="w-full p-2">
                <button
                    class="w-full text-center p-2 text-gray-800 bg-green-400 text-lg my-2 hover:bg-gray-800 hover:text-white">Change
                    Password</button>
            </div>
        </form>
    </div>
</section>

@endsection
