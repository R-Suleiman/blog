@extends('layouts.app')
@section('title', 'Forum Topics')
@section('content')

    <section class="w-11/12 mx-auto my-4">
        <h2 class="text-2xl text-center"><span class="text-green-600">Blog</span> Forum</h2>

        <h4 class="text-2xl my-2">Search results for <span class="text-green-600">" "</span></h4>
        <div class="w-full lg:w-10/12 mx-auto">
            <form action="{{ route('search') }}" method="POST" class="w-full">
                @csrf
                <div class="w-full p-2 flex items-center">
                    <input type="text" name="search" placeholder="search a topic"
                        class="w-full border border-green-400 p-2 outline-none" required>
                    <button class="p-2 text-gray-800 bg-green-400 text-lg">Search</button>
                </div>
            </form>
        </div>

        <div class="w-full mb-4 flex flex-wrap justify-center">
            <button
                class="py-1 px-4 border border-green-400 text-green-400 rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2 text-sm"><a
                    href="{{ route('forum-category-topics') }}">AI</a></button>
            <button
                class="py-1 px-4 border border-green-400 text-green-400 rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2 text-sm"><a
                    href="#">Security</a></button>
        </div>

        <div class="w-full">
            <div class="w-full my-8">
                <div class="w-full">
                    <div class="w-full bg-green-50 p-2 my-2">
                        <div class="flex items-center">
                            <img src="{{ asset('img/user.avif') }}" alt="" class="w-16 rounded-full mr-2">
                            <div class="flex flex-col">
                                <a href="#"><span class="text-xl font-semibold hover:text-green-600">Jane
                                        Doe</span></a>
                                <span class="text-sm">1 minute ago</span>
                            </div>
                        </div>
                        <div class="my-2 px-2">
                            <span class="text-sm my-2 text-green-700">Topic Category</span>
                            <h4 class="text-xl font-semibold hover:text-green-600"><a href="#">Lets talk a bit
                                    more
                                    about a global increase of tech robots and their effects on the people's safety.</a>
                            </h4>
                        </div>

                        <div class="w-full flex items-center text-gray-700 px-2 mt-3">
                            <span><i class="far fa-heart"></i> {{ 0 }}</span>
                            <span class="mx-3"><i class="far fa-comment"></i>
                                5</span>
                            <span><i class="far fa-eye"></i>
                                5</span>
                        </div>
                    </div>
                    <div class="w-full bg-green-50 p-2 my-2">
                        <div class="flex items-center">
                            <img src="{{ asset('img/user.avif') }}" alt="" class="w-16 rounded-full mr-2">
                            <div class="flex flex-col">
                                <a href="#"><span class="text-xl font-semibold hover:text-green-600">Jane
                                        Doe</span></a>
                                <span class="text-sm">1 minute ago</span>
                            </div>
                        </div>
                        <div class="my-2 px-2">
                            <span class="text-sm my-2 text-green-700">Topic Category</span>
                            <h4 class="text-xl font-semibold hover:text-green-600"><a href="#">Lets talk a bit
                                    more
                                    about a global increase of tech robots and their effects on the people's safety.</a>
                            </h4>
                        </div>

                        <div class="w-full flex items-center text-gray-700 px-2 mt-3">
                            <span><i class="far fa-heart"></i> {{ 0 }}</span>
                            <span class="mx-3"><i class="far fa-comment"></i>
                                5</span>
                            <span><i class="far fa-eye"></i>
                                5</span>
                        </div>
                    </div>
                    <div class="w-full bg-green-50 p-2 my-2">
                        <div class="flex items-center">
                            <img src="{{ asset('img/user.avif') }}" alt="" class="w-16 rounded-full mr-2">
                            <div class="flex flex-col">
                                <a href="#"><span class="text-xl font-semibold hover:text-green-600">Jane
                                        Doe</span></a>
                                <span class="text-sm">1 minute ago</span>
                            </div>
                        </div>
                        <div class="my-2 px-2">
                            <span class="text-sm my-2 text-green-700">Topic Category</span>
                            <h4 class="text-xl font-semibold hover:text-green-600"><a href="#">Lets talk a bit
                                    more
                                    about a global increase of tech robots and their effects on the people's safety.</a>
                            </h4>
                        </div>

                        <div class="w-full flex items-center text-gray-700 px-2 mt-3">
                            <span><i class="far fa-heart"></i> {{ 0 }}</span>
                            <span class="mx-3"><i class="far fa-comment"></i>
                                5</span>
                            <span><i class="far fa-eye"></i>
                                5</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full my-4">
                <h3 class="my-4 text-lg lg:text-2xl text-center">More Topics</h3>

                <div class="w-full my-4 md:my-0">
                    <div class="border-b border-gray-300 my-2">
                        <span class="text-sm text-green-600">Topic Category</span>
                        <h4 class="text-lg font-semibold hover:text-green-600"><a href="#">Lets talk a bit more
                                about a global increase of tech robots and their effects on the people's safety....</a></h4>
                        <div class="flex text-sm text-gray-500">
                            <span class="hover:text-green-600">Jane
                                Doe</span><span class="mx-2">-</span>
                            <span>1 minute ago</span>
                        </div>

                        <div class="w-full flex items-center text-gray-700 px-2 my-2">
                            <span><i class="far fa-heart"></i> {{ 0 }}</span>
                            <span class="mx-3"><i class="far fa-comment"></i>
                                5</span>
                            <span><i class="far fa-eye"></i>
                                5</span>
                        </div>
                    </div>
                    <div class="border-b border-gray-300 my-2">
                        <span class="text-sm text-green-600">Topic Category</span>
                        <h4 class="text-lg font-semibold hover:text-green-600"><a href="#">Lets talk a bit more
                                about a global increase of tech robots and their effects on the people's safety....</a></h4>
                        <div class="flex text-sm text-gray-500">
                            <span class="hover:text-green-600">Jane
                                Doe</span><span class="mx-2">-</span>
                            <span>1 minute ago</span>
                        </div>

                        <div class="w-full flex items-center text-gray-700 px-2 my-2">
                            <span><i class="far fa-heart"></i> {{ 0 }}</span>
                            <span class="mx-3"><i class="far fa-comment"></i>
                                5</span>
                            <span><i class="far fa-eye"></i>
                                5</span>
                        </div>
                    </div>
                    <div class="border-b border-gray-300 my-2">
                        <span class="text-sm text-green-600">Topic Category</span>
                        <h4 class="text-lg font-semibold hover:text-green-600"><a href="#">Lets talk a bit more
                                about a global increase of tech robots and their effects on the people's safety....</a></h4>
                        <div class="flex text-sm text-gray-500">
                            <span class="hover:text-green-600">Jane
                                Doe</span><span class="mx-2">-</span>
                            <span>1 minute ago</span>
                        </div>

                        <div class="w-full flex items-center text-gray-700 px-2 my-2">
                            <span><i class="far fa-heart"></i> {{ 0 }}</span>
                            <span class="mx-3"><i class="far fa-comment"></i>
                                5</span>
                            <span><i class="far fa-eye"></i>
                                5</span>
                        </div>
                    </div>
                    <div class="border-b border-gray-300 my-2">
                        <span class="text-sm text-green-600">Topic Category</span>
                        <h4 class="text-lg font-semibold hover:text-green-600"><a href="#">Lets talk a bit more
                                about a global increase of tech robots and their effects on the people's safety....</a></h4>
                        <div class="flex text-sm text-gray-500">
                            <span class="hover:text-green-600">Jane
                                Doe</span><span class="mx-2">-</span>
                            <span>1 minute ago</span>
                        </div>

                        <div class="w-full flex items-center text-gray-700 px-2 my-2">
                            <span><i class="far fa-heart"></i> {{ 0 }}</span>
                            <span class="mx-3"><i class="far fa-comment"></i>
                                5</span>
                            <span><i class="far fa-eye"></i>
                                5</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
