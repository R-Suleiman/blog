@extends('layouts.app')
@section('title', 'Author')
@section('content')

    <section class="w-full">
        <div class="w-11/12 md:w-10/12 mx-auto mb-4">
            <div class="w-full flex flex-col md:flex-row my-6">
                <div class="w-4/12 md:w-2/12 rounded-full border border-green-400 h-fit mr-2">
                    <img src="{{ $author->photo ? asset('/storage/images/profile/admin/' . $author->photo) : asset('img/user.avif') }}"
                        alt="author photo" class="object-center w-full rounded-full">
                </div>
                <div class="w-full md:w-10/12 p-2 flex flex-col">
                    <span class="text-2xl md:text-4xl text-green-400">{{ $author->first_name }}
                        {{ $author->last_name }}</span>
                    <span class="text-gray-700 text-lg my-2 italic">{{ $author->title }}</span>
                    <span class="text-gray-700 text-lg">{{ $author->email }}</span>
                </div>
            </div>
            <div class="w-full">
                <h5 class="my-2 text-2xl text-gray-700">Bio</h5>
                <p class="text-gray-700 text-justify">
                    {{ $author->bio }}
                </p>
            </div>
        </div>

        {{-- posts --}}
        <div class="w-11/12 md:w-10/12 mx-auto md:p-2 my-8">
            <h3 class="my-4 text-2xl text-green-600 border-l-4 px-2 border-green-600">Posts</h3>

            @if ($author->posts->count() > 0)
            @foreach ($author->posts as $post)
                <div class="w-full mx-auto flex my-2">
                    <div class="w-4/12 md:w-3/12 h-fit overflow-hidden bg-green-600 mb-2 mr-3">
                        <a href="{{ route('post',  $post->title) }}">
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
                                href="{{ route('post',  $post->title) }}">{{ $post->title }}</a></h4>
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

        {{-- Topics Hosted --}}
        <div class="w-11/12 md:w-10/12 mx-auto md:p-2 my-8">
            <h5 class="my-2 text-2xl text-gray-700">Topics Hosted</h5>

            @if ($author->topics->count() > 0)
                @foreach ($author->topics as $topic)
                <div class="w-full bg-green-50 p-2 my-2">
                            <span class="text-sm"> {{ $topic->created_at->diffInDays(now()) > 7 ? $topic->created_at->format('F j, Y') : $topic->created_at->diffForHumans() }}</span>

                    <div class="my-2 px-2">
                        <span class="text-sm my-2 text-green-700">{{ $topic->category->category }}</span>
                        <h4 class="text-xl font-semibold hover:text-green-600"><a href="{{ route('forum-topic', $topic->id) }}">{{ $topic->title }}</a>
                        </h4>
                    </div>

                    <div class="w-full flex items-center text-gray-700 px-2 mt-3">
                        <span><i class="far fa-heart"></i> {{ $topic->likes }}</span>
                        <span class="mx-3"><i class="far fa-comment"></i>
                            5</span>
                        <span><i class="far fa-eye"></i>
                            5</span>
                    </div>
                </div>
                @endforeach
            @else
                <div>
                    <p class="p-2 text-lg bg-green-300 border-l-4 border-green-600"> No Topics Hosted</p>
                </div>
            @endif
        </div>
    </section>
@endsection
