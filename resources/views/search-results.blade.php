@extends('layouts.app')
@section('title', 'Search')
@section('content')

    <section class="w-11/12 mx-auto">
        @if (isset($search))
            <h3 class="my-4 text-3xl lg:text-5xl text-green-600 border-l-4 px-2 border-green-600">Search results for
                '{{ $search }}' </h3>
        @else
            <h3 class="my-4 text-3xl lg:text-5xl text-green-600 border-l-4 px-2 border-green-600">Search</h3>
        @endif

        <div class="w-full lg:w-10/12">
            <form action="{{ route('search') }}" method="POST" class="w-full">
                @csrf
                <div class="w-full py-2 flex items-center">
                    <input type="text" name="search" placeholder="search" value="{{ isset($search) ? $search : '' }}"
                        class="w-full border border-green-400 text-lg p-2 outline-none" required>
                    <button class="p-2 text-gray-800 bg-green-400 text-lg">Search</button>
                </div>
            </form>
        </div>

        <p class="text-lg">{{ $searchCount }} Results Found!</p>

        @if (isset($posts))

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
                                <span class="text-gray-700">{{ $post->category->category }}</span>
                                <h4 class="text-lg text-gray-800 hover:text-green-400"><a
                                        href="{{ route('post', $post->title) }}">{{ $post->title }}</a></h4>
                                <span class="my-2 text-gray-700">
                                    {{ $post->author->first_name }}
                                    {{ $post->author->last_name }} -
                                    {{ $post->created_at->diffInDays(now()) > 7 ? $post->created_at->format('F j, Y') : $post->created_at->diffForHumans() }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="w-fit mx-auto">
                <button
                    class="py-1 px-4 border border-green-400 text-green-400 text-lg rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2"><a
                        href="#">Next <i class="fa fa-arrow-right"></i></a></button>
            </div>
        @else
            <p class="text-xl p-4 text-green-700 text-center">No Posts Found!</p>
        @endif
        @endif


        {{-- Explore more --}}
        <div class="my-8">
            <h4 class="text-2xl text-green-700 my-2">Exlore More</h4>
            <div class="w-full mb-8 flex items-center">
                <span class="text-lg mr-2">Topics: </span>
                <div class="flex flex-wrap">
                    @foreach ($categories as $category)
                        <button
                            class="p-1 px-2 border border-green-400 text-green-400 rounded-xl hover:bg-gray-800 hover:text-white text-sm my-2 mr-2"><a
                                href="{{ route('category-posts', $category->category) }}">{{ $category->category }}</a></button>
                    @endforeach
                </div>
            </div>

            <div class="w-full mx-auto md:p-2 my-4">
                @if ($otherPosts->count() > 0)
                    @foreach ($otherPosts as $post)
                        <div class="w-full mx-auto flex my-2">
                            <div class="w-4/12 md:w-3/12 h-fit overflow-hidden bg-green-600 mb-2 mr-3">
                                <a href="{{ route('post', $post->title) }}">
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
                                        href="{{ route('post', $post->title) }}">{{ $post->title }}</a></h4>
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
        </div>
    </section>

@endsection
