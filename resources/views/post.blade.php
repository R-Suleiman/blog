@extends('layouts.app')
@section('title', 'Post')
@section('content')

    <section class="w-full">
        <div class="w-11/12 md:w-9/12 mx-auto my-8 md:p-8">
            <div class="w-full flex items-center justify-between">
                <span class="bg-green-400 text-gray-800 py-1 px-4 text-lg">{{ $post->category->category }}</span>
                <span class="text-gray-500">Posted:
                    {{ $post->created_at->diffInDays(now()) > 7 ? $post->created_at->format('F j, Y') : $post->created_at->diffForHumans() }}</span>
            </div>
            <div class="w-full overflow-hidden my-2">
                @if ($post->file_type == 'Image')
                    <img src="{{ asset('/storage/files/posts/' . $post->file) }}" alt="post image" class="w-full object-fill">
                @else
                    <video src="{{ asset('/storage/files/posts/' . $post->file) }}" controls>
                        Your browser does not support video!
                    </video>
                @endif
            </div>
            <div class="w-full flex items-center my-4">
                <div class="w-16 rounded-full border border-green-400"><img
                        src="{{ $post->author->photo ? asset('/storage/images/profile/admin/' . $post->author->photo) : asset('img/user.avif') }}"
                        alt="author photo" class="object-center w-full rounded-full"></div>
                <div class="flex flex-col mx-2">
                    <span class="text-xl text-gray-800 font-semibold hover:text-green-400"><a
                            href="{{ route('author', [$post->author->first_name, $post->author->last_name]) }}">{{ $post->author->first_name }}
                            {{ $post->author->last_name }}</a></span>
                    <span class="text-gray-700 italic">{{ $post->author->title }}</span>
                </div>
            </div>
            <div class="w-full my-4">
                <span class="text-xl text-gray-700 mt-2">{{ $post->topic }}</span>
                <h3 class="mb-2 text-3xl text-gray-800 font-semibold">{{ $post->title }}</h3>
                <p class="text-lg text-gray-700 text-justify">{{ $post->description }}</p>
            </div>

            {{-- sharing oprions --}}
            <x-post-share />

            <div class="w-full my-8 flex items-center">
                <span class="text-lg mr-2">More Topics: </span>
                <div class="flex flex-wrap">
                    @foreach ($categories as $category)
                        <button
                            class="p-1 px-2 border border-green-400 text-green-400 rounded-xl hover:bg-gray-800 hover:text-white text-sm my-2 mr-2"><a
                                href="{{ route('category-posts', $category->category) }}">{{ $category->category }}</a></button>
                    @endforeach
                </div>
            </div>

            {{-- related --}}
            <div class="w-full mt-8">
                <h3 class="my-2 lg:text-2xl text-green-600 border-l-4 px-2 border-green-600">Related Posts</h3>

                <div class="w-full my-4 flex flex-col md:flex-row flex-wrap">
                    @foreach ($relatedPosts as $relatedPost)
                        <div class="w-full md:w-1/2 lg:w-1/4 my-2">
                            <div class="w-11/12 mx-auto">
                                <div class="h-42 overflow-hidden bg-green-600 mb-2"><a
                                        href="{{ route('post', $relatedPost->title) }}">
                                        @if ($relatedPost->file_type == 'Image')
                                            <img src="{{ asset('/storage/files/posts/' . $relatedPost->file) }}"
                                                alt="" class="object-fit transition scale-110 hover:scale-100">
                                        @else
                                            <video src="{{ asset('/storage/files/posts/' . $relatedPost->file) }}"
                                                controls>
                                                Your browser does not support video!
                                            </video>
                                        @endif
                                    </a></div>
                                <div>
                                    <span class="text-gray-700">{{ $relatedPost->category->category }}</span>
                                    <h4 class="text-lg text-gray-800 hover:text-green-400"><a
                                            href="{{ route('post', $relatedPost->title) }}">{{ $relatedPost->title }}</a>
                                    </h4>
                                    <span class="my-2 text-gray-700">{{ $relatedPost->author->first_name }}
                                        {{ $relatedPost->author->last_name }} -
                                        {{ $relatedPost->created_at->diffInDays(now()) > 7 ? $relatedPost->created_at->format('F j, Y') : $relatedPost->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
