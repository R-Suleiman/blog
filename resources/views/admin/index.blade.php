@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')

<h3 class="text-2xl my-2 mx-3">Welcome, <span class="text-green-400 font-semibold">{{ Auth::guard('admin')->user()->first_name }}</span></h3>

<p class="mx-4 text-red-600">For Root admin only</p>
<section class="w-11/12 mx-auto my-4">
    <div class="w-full flex flex-col md:flex-row flex-wrap">
        <div class="w-full md:w-1/3 lg:w-1/4 my-2 pb-2">
            <div class="w-11/12 mx-auto shadow-sm shadow-green-400 rounded-lg flex flex-col items-center">
                <h4 class="w-full text-center text-2xl bg-gray-800 text-white p-2 rounded-t-lg">My Posts</h4>
                <span class="text-4xl text-green-500 p-2">{{ $myPosts }}</span>
                <a href="{{ route('admin.post.index', ['which_posts' => 'my']) }}">
                    <button
                    class="w-fit py-1 px-4 border border-green-400 text-green-400 rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2">View</button>
                </a>
            </div>
        </div>
        <div class="w-full md:w-1/3 lg:w-1/4 my-2 pb-2">
            <div class="w-11/12 mx-auto shadow-sm shadow-green-400 rounded-lg flex flex-col items-center">
                <h4 class="w-full text-center text-2xl bg-gray-800 text-white p-2 rounded-t-lg">Other Posts</h4>
                <span class="text-4xl text-green-500 p-2">{{ $otherPosts }}</span>
                <a href="{{ route('admin.post.index', ['which_posts' => 'other']) }}">
                    <button
                    class="w-fit py-1 px-4 border border-green-400 text-green-400 rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2">View</button>
                </a>
            </div>
        </div>
        <div class="w-full md:w-1/3 lg:w-1/4 my-2 pb-2">
            <div class="w-11/12 mx-auto shadow-sm shadow-green-400 rounded-lg flex flex-col items-center">
                <h4 class="w-full text-center text-2xl bg-gray-800 text-white p-2 rounded-t-lg">Guest Admins</h4>
                <span class="text-4xl text-green-500 p-2">{{ $guestAdmins }}</span>
                <a href="{{ route('admin.guest-admin.index') }}">
                    <button
                    class="w-fit py-1 px-4 border border-green-400 text-green-400 rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2">View</button>
                </a>
            </div>
        </div>
        <div class="w-full md:w-1/3 lg:w-1/4 my-2 pb-2">
            <div class="w-11/12 mx-auto shadow-sm shadow-green-400 rounded-lg flex flex-col items-center">
                <h4 class="w-full text-center text-2xl bg-gray-800 text-white p-2 rounded-t-lg">Users</h4>
                <span class="text-4xl text-green-500 p-2">{{ $users }}</span>
                <a href="{{ route('admin.guest-user.index') }}">
                    <button
                    class="w-fit py-1 px-4 border border-green-400 text-green-400 rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2">View</button>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
