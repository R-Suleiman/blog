@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')

<section class="w-11/12 mx-auto p-2">
    <h3 class="m-4 text-3xl text-gray-700">Profile Information</h3>
    <div class="w-full flex flex-col md:flex-row my-6">
        <div class="w-4/12 md:w-2/12 rounded-full border border-green-400 h-fit mr-2">
            <img src="{{ $admin->photo ? asset('/storage/images/profile/admin/' . $admin->photo) : asset('img/user.avif') }}" alt="author photo" class="object-center w-full rounded-full">
        </div>
        <div class="w-full md:w-10/12 p-2 flex flex-col">
            <span class="text-2xl md:text-4xl text-green-400">{{ $admin->first_name }} {{ $admin->last_name }}</span>
            <span class="text-gray-700 text-lg my-2 italic">{{ $admin->title }}</span>
            <span class="text-gray-700 text-lg">{{ $admin->email }}</span>
        </div>
    </div>
    <div class="w-full">
        <h5 class="my-2 text-2xl text-gray-700">Bio</h5>
        <p class="text-gray-700 text-justify">
            {{ $admin->bio }}
        </p>
    </div>

    <div class="w-fit my-4 flex flex-col md:flex-row items-center">
        <button
                class="py-1 px-4 border border-green-400 text-green-400 text-lg rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2"><a
                    href="{{ route('admin.guest-admin.edit', $admin) }}">Edit Admin</a></button>

                    <form action="{{ route('admin.guest-admin.destroy', $admin) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button
                class="delete-btn py-1 px-4 border border-red-600 text-red-600 text-lg rounded-xl hover:bg-red-800 hover:text-white my-2 mr-2">Remove Admin</button>
                    </form>
    </div>

    <div class="w-full mx-auto md:p-2 my-8">
        <h5 class="my-2 text-2xl text-gray-700">Posts</h5>

        @if ($admin->posts->count() > 0)
            @foreach ($admin->posts as $post)
                <div class="w-full mx-auto flex my-2">
                    <div class="w-4/12 md:w-3/12 h-fit overflow-hidden bg-green-600 mb-2 mr-3">
                        <a href="{{ route('admin.post.show', ['which_posts' => 'other', 'post' => $post]) }}">
                            @if ($post->file_type == 'Image')
                                <img src="{{ asset('/storage/files/posts/' . $post->file) }}" alt=""
                                    class="object-fit transition scale-110 hover:scale-100">
                            @else
                                <video src="{{ asset('/storage/files/posts/' . $post->file) }}" controls>
                                    Your browser does not support video!
                                </video>
                            @endif
                        </a>
                    </div>
                    <div class="w-8/12 md:w-9/12">
                        <span class="text-sm md:text-md text-gray-700">{{ $post->category->category }}</span>
                        <h4 class="md:text-lg text-gray-800 hover:text-green-400"><a
                                href="{{ route('admin.post.show', ['which_posts' => 'other', 'post' => $post]) }}">{{ $post->title }}</a></h4>
                        <span class="my-2 text-gray-700 text-sm md:text-md">{{ $post->author->first_name }}
                            {{ $post->author->last_name }} -
                            {{ $post->created_at->diffInDays(now()) > 7 ? $post->created_at->format('F j, Y') : $post->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            @endforeach
        @else
            <div>
                <p class="p-2 text-lg bg-green-300 border-l-4 border-green-600"> No Posts Available</p>
            </div>
        @endif


    </div>
</section>

@endsection
