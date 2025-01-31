@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')

    <section class="w-11/12 mx-auto p-2">
        <div class="flex flex-col md:flex-row items-center md:justify-between">
            <h3 class="m-4 text-3xl text-gray-700">Posts Management</h3>
            <a href="{{ route('admin.post.create') }}">
                <button
                    class="py-1 px-4 border border-green-400 text-green-400 text-lg rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2">Create
                    Post</button>
            </a>
        </div>

        @if (Auth::guard('admin')->user()->rank === 1)
            <div class="w-full">
                <a href="{{ route('admin.post.index', ['which_posts' => 'my']) }}">
                    <button
                        class="{{ $which_posts == 'my' ? 'bg-gray-800 text-white' : 'text-green-400  hover:bg-gray-800 hover:text-white' }} py-1 px-4 my-2 mr-2 border border-green-400 text-lg rounded-xl">My
                        Posts</button>
                </a>
                <a href="{{ route('admin.post.index', ['which_posts' => 'other']) }}">
                    <button
                        class="{{ $which_posts == 'other' ? 'bg-gray-800 text-white' : 'text-green-400  hover:bg-gray-800 hover:text-white' }} py-1 px-4 my-2 mr-2 border border-green-400 text-lg rounded-xl">Other
                        Posts</button>
                </a>
            </div>
        @endif

        <div class="w-full lg:w-10/12 mx-auto">
            <form action="{{ route('admin.posts-search-results') }}" method="POST" class="w-full">
                @csrf
                <div class="w-full p-2 flex items-center">
                    <input type="text" name="search" placeholder="search a post"
                        class="w-full border border-green-400 p-2 outline-none" required>
                    <button class="p-2 text-gray-800 bg-green-400 text-lg">Search</button>
                </div>
            </form>
        </div>

        <div class="w-full mx-auto md:p-2 my-8">
            @if ($posts->count() > 0)
                @foreach ($posts as $post)
                    <div class="w-full mx-auto flex my-2">
                        <div class="w-4/12 md:w-3/12 h-fit overflow-hidden bg-green-600 mb-2 mr-3">
                            <a href="{{ route('admin.post.show', ['post' => $post]) }}">
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
                            <span class="text-sm md:text-md text-gray-700">{{ $post->category->category }}
                                {!! $post->featured == 1 ? '<i class="fa fa-star text-green-600 mr-2"></i>' : '' !!}</span>
                            <h4 class="md:text-lg text-gray-800 hover:text-green-400"><a
                                    href="{{ route('admin.post.show', ['post' => $post]) }}">{{ $post->title }}</a>
                            </h4>
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
