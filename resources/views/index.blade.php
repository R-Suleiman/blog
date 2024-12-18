@extends('layouts.app')
@section('title', 'Home')
@section('content')

    {{-- Hero --}}
    <section class="relative w-full bg-gray-700 bg-center bg-cover bg-no-repeat h-60"
        style="background-image: url('img/tech1.png')">
        <div class="overlay w-full p-12">
            <h2 class="text-3xl md:text-5xl text-white my-2 mr-2">Welcome to <span class="text-green-400">Blog</span></h2>
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
        <div class="w-full flex flex-col md:flex-row my-4">
            <div class="w-full md:w-2/3 my-4">
                <div class="w-full flex flex-col">
                    <div class="w-full h-68 lg:h-96 overflow-hidden">
                        <a href="{{ route('post') }}">
                            <img src="img/tech1.png" alt=""
                                class="object-fit transition scale-110 hover:scale-100">
                        </a>
                    </div>
                    <div class="my-4">
                        <span class="bg-green-400 text-gray-800 py-1 px-4 text-lg"><a href="#">Machine
                                Learning</a></span>
                        <h4 class="text-gray-800 hover:text-green-600 text-xl md:text-3xl mt-2"><a href="{{ route('post') }}">The
                                evolution of openAI's chatGPT suprises the world - It can do beyond imaginable</a></h4>
                        <div class="w-full my-1 text-gray-700 text-md md:text-lg">
                            <span>Jane Doe</span> - <span>11/12/2024</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-1/2 flex flex-col md:p-4">
                <div class="w-full flex mb-2">
                    <div class="w-1/3 overflow-hidden mr-2"><img src="img/tech1.png" alt=""
                            class="object-fit"></div>
                    <div class="w-2/3">
                        <span class="text-gray-700 text-sm">AI</span>
                        <h4 class="text-lg hover:text-gray-700"><a href="#">Title of the post or article or
                                something</a></h4>
                        <div class="w-full text-gray-700">
                            <span>Jane Doe</span> - <span>11/12/2024</span>
                        </div>
                    </div>
                </div>
                <div class="w-full flex mb-2">
                    <div class="w-1/3 overflow-hidden mr-2"><img src="img/tech1.png" alt=""
                            class="object-fit"></div>
                    <div class="w-2/3">
                        <span class="text-gray-700 text-sm">Security</span>
                        <h4 class="text-lg hover:text-gray-700"><a href="#">Title of the post or article or
                                something</a></h4>
                        <div class="w-full text-gray-700">
                            <span>Jane Doe</span> - <span>11/12/2024</span>
                        </div>
                    </div>
                </div>
                <div class="w-full flex mb-2">
                    <div class="w-1/3 overflow-hidden mr-2"><img src="img/tech1.png" alt=""
                            class="object-fit"></div>
                    <div class="w-2/3">
                        <span class="text-gray-700 text-sm">AI</span>
                        <h4 class="text-lg hover:text-gray-700"><a href="#">Title of the post or article or
                                something</a></h4>
                        <div class="w-full text-gray-700">
                            <span>Jane Doe</span> - <span>11/12/2024</span>
                        </div>
                    </div>
                </div>
                <div class="w-full flex mb-2">
                    <div class="w-1/3 overflow-hidden mr-2"><img src="img/tech1.png" alt=""
                            class="object-fit"></div>
                    <div class="w-2/3">
                        <span class="text-gray-700 text-sm">AI</span>
                        <h4 class="text-lg hover:text-gray-700"><a href="#">Title of the post or article or
                                something</a></h4>
                        <div class="w-full text-gray-700">
                            <span>Jane Doe</span> - <span>11/12/2024</span>
                        </div>
                    </div>
                </div>
                <div class="w-full flex mb-2">
                    <div class="w-1/3 overflow-hidden mr-2"><img src="img/tech1.png" alt=""
                            class="object-fit"></div>
                    <div class="w-2/3">
                        <span class="text-gray-700 text-sm">Machine Learning</span>
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

    {{-- categories --}}
    <section class="w-11/12 mx-auto my-4">
        <h3 class="my-4 text-3xl text-center text-green-600 px-2">Discover by Category</h3>
        <p class="text-lg lg:text-2xl text-gray-800 text-center">Explore our key topics and dive into the tech categories
            that interests you the most</p>
            <div class="w-full lg:w-10/12 mx-auto">
                <form action="" class="w-full">
                    <div class="w-full p-2 flex items-center">
                        <input type="text" placeholder="search"
                            class="w-full border border-green-400 text-lg p-2 outline-none">
                        <button class="p-2 text-gray-800 bg-green-400 text-lg">Search</button>
                    </div>
                </form>
            </div>
        <div class="w-full my-4 flex flex-wrap justify-center">
            <button
                class="py-1 px-4 border border-green-400 text-green-400 text-lg rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2"><a
                    href="#">Programming</a></button>
            <button
                class="py-1 px-4 border border-green-400 text-green-400 text-lg rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2"><a
                    href="#">AI</a></button>
            <button
                class="py-1 px-4 border border-green-400 text-green-400 text-lg rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2"><a
                    href="#">Machine Learning</a></button>
            <button
                class="py-1 px-4 border border-green-400 text-green-400 text-lg rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2"><a
                    href="#">Security</a></button>
            <button
                class="py-1 px-4 border border-green-400 text-green-400 text-lg rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2"><a
                    href="#">Trending</a></button>
        </div>
    </section>

    {{-- latest news --}}
    <section class="w-11/12 mx-auto my-4 md:mt-12">
        <h3 class="my-4 text-3xl lg:text-5xl text-green-600 border-l-4 px-2 border-green-600">Latest News</h3>
        <p class="text-lg lg:text-2xl text-gray-800">Here's what's been happening recently in the world of tech</p>

        <div class="w-full p-2 my-4 flex flex-col md:flex-row flex-wrap">
            <div class="w-full md:w-1/2 lg:w-1/4 my-2">
                <div class="w-11/12 mx-auto">
                    <div class="h-42 overflow-hidden bg-green-600 mb-2"><a href="#"><img
                                src="img/tech1.png" alt=""
                                class="object-fit transition scale-110 hover:scale-100"></a></div>
                    <div>
                        <span class="text-gray-700">Machine Learning</span>
                        <h4 class="text-lg text-gray-800 hover:text-green-400"><a href="#">The most advanced AI
                                model in History developed</a></h4>
                        <span class="my-2 text-gray-700">Jane Doe - 21 minutes ago</span>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/4 my-2">
                <div class="w-11/12 mx-auto">
                    <div class="h-42 overflow-hidden bg-green-600 mb-2"><a href="#"><img
                                src="img/tech1.png" alt=""
                                class="object-fit transition scale-110 hover:scale-100"></a></div>
                    <div>
                        <span class="text-gray-700">Machine Learning</span>
                        <h4 class="text-lg text-gray-800 hover:text-green-400"><a href="#">The most advanced AI
                                model in History developed</a></h4>
                        <span class="my-2 text-gray-700">Jane Doe - 21 minutes ago</span>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/4 my-2">
                <div class="w-11/12 mx-auto">
                    <div class="h-42 overflow-hidden bg-green-600 mb-2"><a href="#"><img
                                src="img/tech1.png" alt=""
                                class="object-fit transition scale-110 hover:scale-100"></a></div>
                    <div>
                        <span class="text-gray-700">Machine Learning</span>
                        <h4 class="text-lg text-gray-800 hover:text-green-400"><a href="#">The most advanced AI
                                model in History developed</a></h4>
                        <span class="my-2 text-gray-700">Jane Doe - 21 minutes ago</span>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/4 my-2">
                <div class="w-11/12 mx-auto">
                    <div class="h-42 overflow-hidden bg-green-600 mb-2"><a href="#"><img
                                src="img/tech1.png" alt=""
                                class="object-fit transition scale-110 hover:scale-100"></a></div>
                    <div>
                        <span class="text-gray-700">Machine Learning</span>
                        <h4 class="text-lg text-gray-800 hover:text-green-400"><a href="#">The most advanced AI
                                model in History developed</a></h4>
                        <span class="my-2 text-gray-700">Jane Doe - 21 minutes ago</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-fit mx-auto">
            <button
                class="py-1 px-4 border border-green-400 text-green-400 text-lg rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2"><a
                    href="#">See more <i class="fa fa-arrow-right"></i></a></button>
        </div>
    </section>

    {{-- explore more --}}
    <section class="w-11/12 mx-auto my-8">
        <h3 class="my-4 text-3xl text-center text-green-600 px-2">More on Blog</h3>

        <div class="w-full p-2 my-4 flex flex-col md:flex-row flex-wrap">
            <div class="w-full md:w-1/2 lg:w-1/4 my-2">
                <div class="w-11/12 mx-auto">
                    <div class="h-42 overflow-hidden bg-green-600 mb-2"><a href="#"><img src="img/tech1.png" alt="" class="object-fit transition scale-110 hover:scale-100"></a></div>
                    <div>
                        <span class="text-gray-700">Machine Learning</span>
                        <h4 class="text-lg text-gray-800 hover:text-green-400"><a href="#">The most advanced AI model in History developed</a></h4>
                        <span class="my-2 text-gray-700">Jane Doe - 21 minutes ago</span>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/4 my-2">
                <div class="w-11/12 mx-auto">
                    <div class="h-42 overflow-hidden bg-green-600 mb-2"><a href="#"><img src="img/tech1.png" alt="" class="object-fit transition scale-110 hover:scale-100"></a></div>
                    <div>
                        <span class="text-gray-700">Machine Learning</span>
                        <h4 class="text-lg text-gray-800 hover:text-green-400"><a href="#">The most advanced AI model in History developed</a></h4>
                        <span class="my-2 text-gray-700">Jane Doe - 21 minutes ago</span>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/4 my-2">
                <div class="w-11/12 mx-auto">
                    <div class="h-42 overflow-hidden bg-green-600 mb-2"><a href="#"><img src="img/tech1.png" alt="" class="object-fit transition scale-110 hover:scale-100"></a></div>
                    <div>
                        <span class="text-gray-700">Machine Learning</span>
                        <h4 class="text-lg text-gray-800 hover:text-green-400"><a href="#">The most advanced AI model in History developed</a></h4>
                        <span class="my-2 text-gray-700">Jane Doe - 21 minutes ago</span>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/4 my-2">
                <div class="w-11/12 mx-auto">
                    <div class="h-42 overflow-hidden bg-green-600 mb-2"><a href="#"><img src="img/tech1.png" alt="" class="object-fit transition scale-110 hover:scale-100"></a></div>
                    <div>
                        <span class="text-gray-700">Machine Learning</span>
                        <h4 class="text-lg text-gray-800 hover:text-green-400"><a href="#">The most advanced AI model in History developed</a></h4>
                        <span class="my-2 text-gray-700">Jane Doe - 21 minutes ago</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-fit mx-auto">
            <button class="py-1 px-4 border border-green-400 text-green-400 text-lg rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2"><a href="#">All Articles <i class="fa fa-arrow-right"></i></a></button>
        </div>
    </section>

    {{-- Newsletter --}}
    <section class="w-full p-12 bg-gray-700">
        <h3 class="text-4xl text-green-400 text-center">Subscibe to our Newsletter</h3>
        <p class="text-lg text-white text-center my-2">Stay updated with the latest news and events as they happen</p>
        <div class="w-fit mx-auto my-4">
            <button class="w-max bg-green-400 py-1 px-4 rounded-xl text-gray-700 text-lg font-semibold hover:text-white hover:bg-green-700">Subscribe</button>
        </div>
    </section>
@endsection
