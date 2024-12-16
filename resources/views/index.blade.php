@extends('layouts.app')
@section('title', 'Home Page')
@section('content')

    {{-- Hero --}}
    <section class="relative w-full bg-gray-700 bg-center bg-cover bg-no-repeat h-60"
        style="background-image: url('{{ asset('img/tech1.png') }}')">
        <div class="overlay w-full p-12">
            <h2 class="text-3xl md:text-5xl text-white my-2">Welcome to <span class="text-green-400">Blog</span></h2>
            <h3 class="text-white text-lg md:text-2xl my-2">Insights into the Latest Tech Trends</h3>
            <h3 class="text-white text-md md:text-xl my-2">Stay updated on various tech topics; <span
                    class="text-green-400">AI</span>, <span class="text-green-400">Programming</span>, <span
                    class="text-green-400">Cybersecurity</span>, and more.
            </h3>
        </div>
    </section>

    {{-- featured posts --}}
    <section class="w-11/12 mx-auto my-4 p-2">
        <h3 class="my-4 text-5xl text-green-600 border-l-4 px-2 border-green-600">Featured Posts</h3>
        <div class="w-full flex flex-col md:flex-row my-4">
            <div class="w-full md:w-2/3 my-4">
                <div class="w-full flex flex-col">
                    <div class="w-full h-68 lg:h-96 overflow-hidden">
                        <a href="#">
                            <img src="{{ asset('img/tech1.png') }}" alt=""
                                class="object-fit transition scale-110 hover:scale-100">
                        </a>
                    </div>
                    <div class="my-4">
                        <span class="bg-green-400 text-gray-800 py-1 px-4 text-lg"><a href="#">category</a></span>
                        <h4 class="text-gray-800 hover:text-green-600 text-4xl mt-2"><a href="#">Title of the post or
                                the article</a></h4>
                        <div class="w-full my-1 text-gray-700 text-lg">
                            <span>Jane Doe</span> - <span>11/12/2024</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-1/2 flex flex-col p-4">
                <div class="w-full flex mb-2">
                    <div class="w-1/3 overflow-hidden mr-2"><img src="{{ asset('img/tech1.png') }}" alt=""
                            class="object-fit"></div>
                    <div class="w-2/3">
                        <h4 class="text-lg hover:text-gray-700"><a href="#">Title of the post or article or
                                something</a></h4>
                        <div class="w-full text-gray-700">
                            <span>Jane Doe</span> - <span>11/12/2024</span>
                        </div>
                    </div>
                </div>
                <div class="w-full flex mb-2">
                    <div class="w-1/3 overflow-hidden mr-2"><img src="{{ asset('img/tech1.png') }}" alt=""
                            class="object-fit"></div>
                    <div class="w-2/3">
                        <h4 class="text-lg hover:text-gray-700"><a href="#">Title of the post or article or
                                something</a></h4>
                        <div class="w-full text-gray-700">
                            <span>Jane Doe</span> - <span>11/12/2024</span>
                        </div>
                    </div>
                </div>
                <div class="w-full flex mb-2">
                    <div class="w-1/3 overflow-hidden mr-2"><img src="{{ asset('img/tech1.png') }}" alt=""
                            class="object-fit"></div>
                    <div class="w-2/3">
                        <h4 class="text-lg hover:text-gray-700"><a href="#">Title of the post or article or
                                something</a></h4>
                        <div class="w-full text-gray-700">
                            <span>Jane Doe</span> - <span>11/12/2024</span>
                        </div>
                    </div>
                </div>
                <div class="w-full flex mb-2">
                    <div class="w-1/3 overflow-hidden mr-2"><img src="{{ asset('img/tech1.png') }}" alt=""
                            class="object-fit"></div>
                    <div class="w-2/3">
                        <h4 class="text-lg hover:text-gray-700"><a href="#">Title of the post or article or
                                something</a></h4>
                        <div class="w-full text-gray-700">
                            <span>Jane Doe</span> - <span>11/12/2024</span>
                        </div>
                    </div>
                </div>
                <div class="w-full flex mb-2">
                    <div class="w-1/3 overflow-hidden mr-2"><img src="{{ asset('img/tech1.png') }}" alt=""
                            class="object-fit"></div>
                    <div class="w-2/3">
                        <h4 class="text-lg hover:text-gray-700"><a href="#">Title of the post or article or
                                something</a></h4>
                        <div class="w-full text-gray-700">
                            <span>Jane Doe</span> - <span>11/12/2024</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
