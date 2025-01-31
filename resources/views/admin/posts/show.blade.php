@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')

    <section class="w-11/12 mx-auto p-2">
        <div class="w-full my-8 md:p-8">

            <div class="w-fit mb-4 ml-auto flex flex-col md:flex-row items-center">
                <button
                    class="py-1 px-4 border border-green-400 text-green-400 text-lg rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2"><a
                        href="{{ route('admin.post.edit', ['post' => $post]) }}">Edit Post</a></button>

                <form action="{{ route('admin.post.destroy', ['post' => $post]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button
                        class="delete-btn py-1 px-4 border border-red-600 text-red-600 text-lg rounded-xl hover:bg-red-800 hover:text-white my-2 mr-2"
                       >Delete Post</button>
                </form>
            </div>

            <div class="w-full flex items-center justify-between">
                <span class="bg-green-400 text-gray-800 py-1 px-4 text-lg">{{ $post->category->category }}</span>
                <span class="text-gray-500">Posted on:
                    {{ $post->created_at->diffInDays(now()) > 7 ? $post->created_at->format('F j, Y') : $post->created_at->diffForHumans() }}</span>
            </div>
            <div class="w-full overflow-hidden my-2">
                @if ($post->file_type == 'Image')
                    <img src="{{ asset('/storage/files/posts/' . $post->file) }}" alt="post image"
                        class="w-full object-fill">
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
                            href="{{ route('admin.guest-admin.show', $post->author) }}">{{ $post->author->first_name }}
                            {{ $post->author->last_name }}</a></span>
                    <span class="text-gray-700 italic">{{ $post->author->title }}</span>
                </div>
            </div>
            <div class="w-full my-4">
                <span class="text-xl text-gray-700 mt-2">{{ $post->topic }}</span>
                <h3 class="mb-2 text-3xl text-gray-800 font-semibold">{{ $post->title }}</h3>
                <p class="text-lg text-gray-700 text-justify">{{ $post->description }}</p>
            </div>

            {{-- <div class="w-full my-8 flex items-center text-gray-700">
                <span><i class="far fa-thumbs-up"></i> {{ $post->likes }}</span> <span class="mx-3"><i
                        class="far fa-thumbs-down"></i>
                    {{ $post->dislikes }}</span> <span><i class="far fa-comment"></i> 5</span>
            </div> --}}

            <div class="w-full my-8 flex items-center">
                <span class="text-lg mr-2">More Topics: </span>
                <div class="flex flex-wrap">
                    @foreach ($categories as $category)
                        <button
                            class="p-1 px-2 border border-green-400 text-green-400 rounded-xl hover:bg-gray-800 hover:text-white text-sm my-2 mr-2"><a
                                href="#">{{ $category->category }}</a></button>
                    @endforeach
                </div>
            </div>

            {{-- comments --}}
            {{-- <div class="w-full">
                <div class="w-full border border-green-400 p-4">
                    <h3 class="font-semibold text-2xl mb-4">Conversations</h3>

                    <div class="w-full">
                        <div class="w-full flex my-2">
                            <div class="w-32 md:w-24 rounded-full border border-green-400 mr-2 h-fit">
                                <a href="#"><img src="{{ asset('img/user.avif') }}" alt="author photo"
                                        class="object-center w-full rounded-full"></a>
                            </div>
                            <div class="flex flex-col">
                                <div class="w-full flex flex-col">
                                    <span class="mr-2 text-gray-800 font-semibold">Jane Doe</span>
                                    <span class="text-sm text-gray-600">13:00 - 12/12/2023</span>
                                </div>
                                <p class="my-2 text-gray-700 text-justify">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Labore laboriosam reprehenderit saepe asperiores deleniti, maxime id.
                                    Quas nostrum velit expedita enim optio non, ullam eius, repellat, asperiores dolor
                                    consequatur fuga!</p>
                                <div class="text-gray-700 mb-3">
                                    <span>Reply</span> <span class="mx-3"><i class="far fa-thumbs-up"></i> 12</span>
                                    <span><i class="far fa-thumbs-down"></i> 12</span>
                                </div>
                            </div>
                        </div>
                        <div class="w-full flex my-2">
                            <div class="w-32 md:w-24 rounded-full border border-green-400 mr-2 h-fit">
                                <a href="#"><img src="{{ asset('img/user.avif') }}" alt="author photo"
                                        class="object-center w-full rounded-full"></a>
                            </div>
                            <div class="flex flex-col">
                                <div class="w-full flex flex-col">
                                    <span class="mr-2 text-gray-800 font-semibold">Jane Doe</span>
                                    <span class="text-sm text-gray-600">13:00 - 12/12/2023</span>
                                </div>
                                <p class="my-2 text-gray-700 text-justify">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Labore laboriosam reprehenderit saepe asperiores deleniti, maxime id.
                                    Quas nostrum velit expedita enim optio non, ullam eius, repellat, asperiores dolor
                                    consequatur fuga!</p>
                                <div class="text-gray-700 mb-3">
                                    <span>Reply</span> <span class="mx-3"><i class="far fa-thumbs-up"></i> 12</span>
                                    <span><i class="far fa-thumbs-down"></i> 12</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full mt-8">
                        <form action="#">
                            <div class="w-full p-2">
                                <textarea name="" id="" cols="30" rows="5" placeholder="Add a comment"
                                    class="w-full border border-green-400 text-lg p-2 outline-none"></textarea>
                                <button class="p-2 text-gray-800 bg-green-400 text-lg my-2">Comment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> --}}

            {{-- related --}}
            <div class="w-full mt-8">
                <h3 class="my-2 lg:text-2xl text-green-600 border-l-4 px-2 border-green-600">Related Posts</h3>

                <div class="w-full my-4 flex flex-col md:flex-row flex-wrap">
                    @foreach ($relatedPosts as $relatedPost)
                        <div class="w-full md:w-1/2 lg:w-1/4 my-2">
                            <div class="w-11/12 mx-auto">
                                <div class="h-42 overflow-hidden bg-green-600 mb-2"><a
                                        href="{{ route('admin.post.show', ['post' => $relatedPost]) }}">
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
                                            href="{{ route('admin.post.show', ['post' => $relatedPost]) }}">{{ $relatedPost->title }}</a>
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
