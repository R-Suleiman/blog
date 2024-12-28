@extends('layouts.admin')
@section('title', 'Profile')
@section('content')

    <section class="w-11/12 mx-auto p-2">
        <h3 class="m-4 text-3xl text-gray-700">Admins Management</h3>
        <div class="w-full mx-auto border border-green-400 my-8 p-2 md:p-4 flex flex-col items-center">
            <h3 class="text-3xl text-green-400 font-semibold mb-4">Register new Admin</h3>

            <form action="{{ route('admin.guest-admin.store') }}" method="POST" enctype="multipart/form-data"
                class="w-full p-2 my-4">
                @csrf
                <div class="flex flex-col md:flex-row items-center">
                    <div class="w-full md:w-1/2 p-2">
                        <label for="first_name" class="text-xl mb-2 text-gray-700">First Name:</label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}"
                            class="w-full border border-green-400 text-lg p-2 outline-none">
                        @error('first_name')
                            <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2 p-2">
                        <label for="last_name" class="text-xl mb-2 text-gray-700">Last Name:</label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}"
                            class="w-full border border-green-400 text-lg p-2 outline-none">
                        @error('last_name')
                            <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-col md:flex-row items-center">
                    <div class="w-full md:w-1/2 p-2">
                        <label for="title" class="text-xl mb-2 text-gray-700">Title:</label>
                        <input type="text" name="title" value="{{ old('title') }}"
                            class="w-full border border-green-400 text-lg p-2 outline-none">
                        @error('title')
                            <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2 p-2">
                        <label for="email" class="text-xl mb-2 text-gray-700">Email:</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full border border-green-400 text-lg p-2 outline-none">
                        @error('email')
                            <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="w-full p-2">
                    <label for="bio" class="text-xl mb-2 text-gray-700">Bio:</label>
                    <textarea name="bio" id="" rows="5" class="w-full border border-green-400 text-lg p-2 outline-none">
                    {{ old('bio') }}
                </textarea>
                    @error('bio')
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
                    <label for="photo" class="text-xl mb-2 text-gray-700">Photo:</label>
                    <input type="file" name="photo" class="w-full border border-green-400 text-lg p-2 outline-none">

                    @error('photo')
                        <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full p-2">
                    <label for="rank" class="text-xl mb-2 text-gray-700">Rank:</label>
                    <div>
                        <span class="text-lg text-gray-700">Full Priviledge:</span>
                        <input type="checkbox" name="rank" class="border border-green-400 text-xl p-2 outline-none mx-2">
                    </div>

                    @error('rank')
                        <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full p-2">
                    <button
                        class="py-1 px-4 border border-green-400 text-green-400 text-lg rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2">Register</button>
                </div>
            </form>

        </div>
    </section>

@endsection
