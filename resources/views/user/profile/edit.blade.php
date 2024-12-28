@extends('layouts.user')
@section('title', 'Profile')
@section('content')

    <section class="w-11/12 mx-auto p-2">
        <h3 class="m-4 text-3xl text-gray-700">Profile Information</h3>
        <div class="w-full mx-auto border border-green-400 my-8 p-2 md:p-4 flex flex-col items-center">
            <h3 class="text-3xl text-green-400 font-semibold mb-4">Update Profile Details</h3>

            <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data" class="w-full p-2 my-4">
                @csrf
                @method('PUT')
                <div class="flex flex-col md:flex-row items-center">
                    <div class="w-full md:w-1/2 p-2">
                        <label for="first_name" class="text-xl mb-2 text-gray-700">First Name:</label>
                        <input type="text" name="first_name" value="{{ $user->first_name }}"
                            class="w-full border border-green-400 text-lg p-2 outline-none">
                        @error('first_name')
                            <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2 p-2">
                        <label for="last_name" class="text-xl mb-2 text-gray-700">Last Name:</label>
                        <input type="text" name="last_name" value="{{ $user->last_name }}"
                            class="w-full border border-green-400 text-lg p-2 outline-none">
                        @error('last_name')
                            <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                    <div class="w-full p-2">
                        <label for="email" class="text-xl mb-2 text-gray-700">Email:</label>
                        <input type="email" name="email" value="{{ $user->email }}"
                            class="w-full border border-green-400 text-lg p-2 outline-none">
                        @error('email')
                            <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                        @enderror
                    </div>

                <div class="w-full p-2">
                    <label for="photo" class="text-xl mb-2 text-gray-700">Photo:</label>
                    <input type="file" name="photo" class="w-full border border-green-400 text-lg p-2 outline-none">

                    @error('photo')
                    <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                @enderror

                <div class="w-4/12 md:w-2/12 mx-auto my-4 rounded-full border border-green-400 h-fit">
                    <img src="{{ $user->photo ? asset('/storage/images/profile/user/' . $user->photo) : asset('img/user.avif') }}" alt="author photo" class="object-center w-full rounded-full">
                </div>
                </div>

                <div class="w-full p-2">
                    <button
                        class="py-1 px-4 border border-green-400 text-green-400 text-lg rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2">Save</button>
                </div>
            </form>

        </div>
    </section>

@endsection
