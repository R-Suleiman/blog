@extends('layouts.app')
@section('title', 'Latest News')
@section('content')

    <section class="w-11/12 mx-auto">
        <h3 class="my-4 text-3xl lg:text-5xl text-green-600 border-l-4 px-2 border-green-600">{{ $category }}</h3>

        @if ($categoryPosts->count() > 0)
            <div class="w-full p-2 my-4 flex flex-col md:flex-row flex-wrap">
                @foreach ($categoryPosts as $post)
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
                {{ $categoryPosts->links() }}
            </div>
        @else
            <x-no-record>No Posts Available</x-no-record>
        @endif

        <div class="flex items-center my-4">
            <span class="text-lg mr-2">Other categories: </span>
            <div class="flex flex-wrap">
                @foreach ($otherCategories as $category)
                    <button
                        class="py-1 px-4 border border-green-400 text-green-400 text-lg rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2"><a
                            href="{{ route('category-posts', $category->category) }}">{{ $category->category }}</a></button>
                @endforeach

            </div>
        </div>
    </section>

@endsection
