@extends('layouts.app')
@section('title', 'Home')
@section('content')

    {{-- Hero --}}
    <section class="relative w-full bg-gray-700 bg-center bg-cover bg-no-repeat h-60"
        style="background-image: url('img/tech1.png')">
        <div class="overlay w-full p-12">
            <h2 class="text-3xl md:text-5xl text-white my-2 mr-2">Welcome to <span class="text-green-400">Mwanateknolojia</span></h2>
            <h3 class="text-white text-lg md:text-2xl my-2 mr-2">Insights into the Latest Tech Trends</h3>
            <h3 class="text-white text-md md:text-xl my-2 mr-2">Stay updated on various tech topics; <span
                    class="text-green-400">AI</span>, <span class="text-green-400">Programming</span>, <span
                    class="text-green-400">Cybersecurity</span>, and more.
            </h3>
        </div>
    </section>

    {{-- featured posts --}}
    <section class="w-11/12 mx-auto my-4 p-2">
        <h3 class="my-4 text-3xl lg:text-5xl text-green-600 border-l-4 px-2 border-green-600">Featured Posts</h3>
        @if ($featuredPosts->count() > 0)

        <div class="w-full flex flex-col md:flex-row my-4">
            <div class="w-full md:w-2/3 my-4">
                <div class="w-full flex flex-col">
                    <div class="w-full h-68 lg:h-96 overflow-hidden">
                        <a href="{{ route('post', $featuredPosts[0]->title) }}">
                            @if ($featuredPosts[0]->file_type == 'Image')
                                <img src="{{ asset('/storage/files/posts/' . $featuredPosts[0]->file) }}" alt=""
                                    class="object-fit transition scale-110 hover:scale-100">
                            @else
                                <video src="{{ asset('/storage/files/posts/' . $featuredPosts[0]->file) }}" controls>
                                    Your browser does not support video!
                                </video>
                            @endif
                        </a>
                    </div>
                    <div class="my-4">
                        <span class="bg-green-400 text-gray-800 py-1 px-4 text-lg"><a
                                href="{{ route('category-posts', $featuredPosts[0]->category->category) }}">{{ $featuredPosts[0]->category->category }}</a></span>
                        <h4 class="text-gray-800 hover:text-green-600 text-xl md:text-3xl mt-2"><a
                                href="{{ route('post',  $featuredPosts[0]->title) }}">{{ $featuredPosts[0]->title }}</a></h4>
                        <div class="w-full my-1 text-gray-700 text-md md:text-lg">
                            <span class="hover:text-green-400"><a
                                    href="{{ route('author', [$featuredPosts[0]->author->first_name, $featuredPosts[0]->author->last_name]) }}">{{ $featuredPosts[0]->author->first_name }}
                                    {{ $featuredPosts[0]->author->last_name }}</a></span> -
                            <span>{{ $featuredPosts[0]->created_at->diffInDays(now()) > 7 ? $featuredPosts[0]->created_at->format('F j, Y') : $featuredPosts[0]->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-1/2 flex flex-col md:p-4">
                @for ($i = 1; $i <= $featuredPosts->count() - 1; $i++)
                    <div class="w-full flex mb-2">
                        <div class="w-1/3 overflow-hidden mr-2">
                            @if ($featuredPosts[$i]->file_type == 'Image')
                                <img src="{{ asset('/storage/files/posts/' . $featuredPosts[$i]->file) }}" alt=""
                                    class="object-fit">
                            @else
                                <video src="{{ asset('/storage/files/posts/' . $featuredPosts[$i]->file) }}" controls>
                                    Your browser does not support video!
                                </video>
                            @endif
                        </div>
                        <div class="w-2/3">
                            <span class="text-gray-700 hover:text-green-700 text-sm"><a href="{{ route('category-posts', $featuredPosts[$i]->category->category) }}">{{ $featuredPosts[$i]->category->category }}</a></span>
                            <h4 class="text-lg hover:text-gray-700"><a href="{{ route('post',  $featuredPosts[$i]->title) }}">{{ $featuredPosts[$i]->title }}</a>
                            </h4>
                            <div class="w-full text-gray-700">
                                <span><a href="{{ route('author', [$featuredPosts[$i]->author->first_name, $featuredPosts[0]->author->last_name]) }}"> {{ $featuredPosts[$i]->author->first_name }} </a></span> -
                                <span>{{ $featuredPosts[$i]->created_at->diffInDays(now()) > 7 ? $featuredPosts[$i]->created_at->format('F j, Y') : $featuredPosts[$i]->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
        @else
        <x-no-record>No posts Available!</x-no-record>
        @endif
    </section>

    {{-- categories --}}
    <section class="w-11/12 mx-auto my-4">
        <h3 class="my-4 text-3xl text-center text-green-600 px-2">Discover by Category</h3>
        <p class="text-lg lg:text-2xl text-gray-800 text-center">Explore our key topics and dive into the tech categories
            that interests you the most</p>
        <div class="w-full lg:w-10/12 mx-auto">
            <form action="{{ route('search') }}" method="POST" class="w-full">
                @csrf
                <div class="w-full p-2 flex items-center">
                    <input type="text" name="search" placeholder="search"
                        class="w-full border border-green-400 text-lg p-2 outline-none" required>
                    <button class="p-2 text-gray-800 bg-green-400 text-lg">Search</button>
                </div>
            </form>
        </div>
        <div class="w-full my-4 flex flex-wrap justify-center">
            @if ($categories->count() > 0)
            @foreach ($categories as $category)
                <button
                    class="py-1 px-4 border border-green-400 text-green-400 text-lg rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2"><a
                        href="{{ route('category-posts', $category->category) }}">{{ $category->category }}</a></button>
            @endforeach
                @else
                <x-no-record >No categories found</x-no-record>
            @endif

        </div>
    </section>

    {{-- latest news --}}
    <section class="w-11/12 mx-auto my-4 md:mt-12">
        <h3 class="my-4 text-3xl lg:text-5xl text-green-600 border-l-4 px-2 border-green-600">Latest News</h3>
        <p class="text-lg lg:text-2xl text-gray-800">Here's what's been happening recently in the world of tech</p>

        <div class="w-full p-2 my-4 flex flex-col md:flex-row flex-wrap">
            @if ($latestPosts->count() > 0)
                @foreach ($latestPosts as $post)
                    <div class="w-full md:w-1/2 lg:w-1/4 my-2">
                        <div class="w-11/12 mx-auto">
                            <div class="h-42 overflow-hidden bg-green-600 mb-2"><a href="{{ route('post',  $post->title) }}">
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
                                        href="{{ route('post',  $post->title) }}">{{ $post->title }}</a></h4>
                                <span class="my-2 text-gray-700 text-sm md:text-md">{{ $post->author->first_name }}
                                    {{ $post->author->last_name }} -
                                    {{ $post->created_at->diffInDays(now()) > 7 ? $post->created_at->format('F j, Y') : $post->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <x-no-record>No Posts Available</x-no-record>
            @endif

        </div>

        <div class="w-fit mx-auto">
            <button
                class="py-1 px-4 border border-green-400 text-green-400 text-lg rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2"><a
                    href="{{ route('latest', ['tag' => 'all']) }}">See more <i class="fa fa-arrow-right"></i></a></button>
        </div>
    </section>

    {{-- explore more --}}
    <section class="w-11/12 mx-auto my-8">
        <h3 class="my-4 text-3xl text-center text-green-600 px-2">More on Mwanateknolojia</h3>

        <div class="w-full p-2 my-4 flex flex-col md:flex-row flex-wrap">
            @if ($otherPosts->count() > 0)
                @foreach ($otherPosts as $post)
                    <div class="w-full md:w-1/2 lg:w-1/4 my-2">
                        <div class="w-11/12 mx-auto">
                            <div class="h-42 overflow-hidden bg-green-600 mb-2"><a href="{{ route('post',  $post->title) }}">
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
                                        href="{{ route('post',  $post->title) }}">{{ $post->title }}</a></h4>
                                <span class="my-2 text-gray-700 text-sm md:text-md">{{ $post->author->first_name }}
                                    {{ $post->author->last_name }} -
                                    {{ $post->created_at->diffInDays(now()) > 7 ? $post->created_at->format('F j, Y') : $post->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <x-no-record>No Posts Available</x-no-record>
            @endif
        </div>

        <div class="w-fit mx-auto">
            <button
                class="py-1 px-4 border border-green-400 text-green-400 text-lg rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2"><a
                    href="{{ route('posts', ['tag' => 'all']) }}">All Posts <i class="fa fa-arrow-right"></i></a></button>
        </div>
    </section>

    {{-- Newsletter --}}
    <section class="w-full p-12 bg-gray-700">
        <h3 class="text-4xl text-green-400 text-center">Subscibe to our Newsletter</h3>
        <p class="text-lg text-white text-center my-2">Stay updated with the latest news and posts as they are posted</p>
        <div class="w-full md:w-2/5 mx-auto my-4">
            @if (session('email-success'))
                <div class="flash-message mt-4 text-green-500">{{ session('email-success') }}</div>
            @endif

            <form action="{{ route('newsletter.subscribe') }}" method="POST">
                @csrf
                <div class="flex flex-col items-center">
                    <input type="email" name="email" placeholder="email" class="w-full border-2 border-green-400 bg-gray-700 text-white text-lg p-2 outline-none my-2" required>
                    <button type="submit"
                        class="w-max bg-green-400 py-1 px-4 rounded-xl text-gray-700 text-lg font-semibold hover:text-white hover:bg-green-700">Subscribe</button>
                </div>
            </form>
        </div>
    </section>
@endsection
