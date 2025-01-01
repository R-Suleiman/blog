@extends('layouts.app')
@section('title', 'All Posts')
@section('content')

    <section class="w-11/12 mx-auto">
        <h3 class="my-4 text-3xl lg:text-5xl text-green-600 border-l-4 px-2 border-green-600">All Posts</h3>

        <div class="w-full lg:w-10/12">
            <form action="{{ route('search') }}" method="POST" class="w-full">
                @csrf
                <div class="w-full py-2 flex items-center">
                    <input type="text" name="search" placeholder="search"
                        class="w-full border border-green-400 text-lg p-2 outline-none" required>
                    <button class="p-2 text-gray-800 bg-green-400 text-lg">Search</button>
                </div>
            </form>
        </div>
        <div class="flex items-center">
            <span class="text-lg mr-2">Filter: </span>
            <div class="flex flex-wrap">
                <a href="{{ route('posts', ['tag' => 'all']) }}">
                    <button
                        class="{{ $tag == 'all' ? 'bg-gray-800 text-white' : 'text-green-400  hover:bg-gray-800 hover:text-white' }} p-1 px-2 my-2 mr-2 border border-green-400 text-sm rounded-xl">
                        <i class="fa fa-list"></i> All</button>
                </a>

                @foreach ($categories as $category)
                    <a href="{{ route('posts', $category->category) }}">
                        <button
                            class="{{ $category->category == $tag ? 'bg-gray-800 text-white' : 'text-green-400  hover:bg-gray-800 hover:text-white' }} p-1 px-2 my-2 mr-2 border border-green-400 text-sm rounded-xl">{{ $category->category }}</button>
                    </a>
                @endforeach
            </div>
        </div>

        @if ($posts->count() > 0)
        <div class="w-full p-2 my-4 flex flex-col md:flex-row flex-wrap">
                @foreach ($posts as $post)
                    <div class="w-full md:w-1/2 lg:w-1/4 my-2">
                        <div class="w-11/12 mx-auto">
                            <div class="h-42 overflow-hidden bg-green-600 mb-2"><a href="{{ route('post', $post->title) }}">
                                    @if ($post->file_type == 'Image')
                                        <img src="{{ asset('/storage/files/posts/' . $post->file) }}" alt=""
                                            class="object-fit transition scale-110 hover:scale-100">
                                    @else
                                        <video src="{{ asset('/storage/files/posts/' . $post->file) }}" controls>
                                            Your browser does not support video!
                                        </video>
                                    @endif
                                </a></div>
                            <div>
                                <span class="text-sm md:text-md text-gray-700">{{ $post->category->category }}</span>
                                <h4 class="md:text-lg text-gray-800 hover:text-green-400"><a
                                        href="{{ route('post', $post->title) }}">{{ $post->title }}</a></h4>
                                <span class="my-2 text-gray-700 text-sm md:text-md">{{ $post->author->first_name }}
                                    {{ $post->author->last_name }} -
                                    {{ $post->created_at->diffInDays(now()) > 7 ? $post->created_at->format('F j, Y') : $post->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

                <div class="my-4">
                    {{ $posts->links() }}
                </div>
            @else
                <x-no-record>No Posts Available</x-no-record>
            @endif

    </section>

@endsection
