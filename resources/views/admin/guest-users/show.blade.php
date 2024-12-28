@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')

<section class="w-11/12 mx-auto p-2">
    <h3 class="m-4 text-3xl text-gray-700">Profile Information</h3>
    <div class="w-full flex flex-col md:flex-row my-6">
        <div class="w-4/12 md:w-2/12 rounded-full border border-green-400 h-fit mr-2">
            <img src="{{ $user->photo ? asset('/storage/images/profile/user/' . $user->photo) : asset('img/user.avif') }}" alt="author photo" class="object-center w-full rounded-full">
        </div>
        <div class="w-full md:w-10/12 p-2 flex flex-col">
            <span class="text-2xl md:text-4xl text-green-400">{{ $user->first_name }} {{ $user->last_name }}</span>
            <span class="text-gray-700 text-lg my-2 italic">{{ $user->title }}</span>
            <span class="text-gray-700 text-lg">{{ $user->email }}</span>
        </div>
    </div>


    <div class="w-fit my-4 flex flex-col md:flex-row items-center">
        <button
                class="py-1 px-4 border border-green-400 text-green-400 text-lg rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2"><a
                    href="{{ route('admin.guest-user.edit', $user) }}">Edit User</a></button>

                    <form action="{{ route('admin.guest-user.destroy', $user) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button
                class="py-1 px-4 border border-red-600 text-red-600 text-lg rounded-xl hover:bg-red-800 hover:text-white my-2 mr-2" onclick="return confirm('Are you sure you want to remove this User?')">Remove User</button>
                    </form>
    </div>
</section>

@endsection
