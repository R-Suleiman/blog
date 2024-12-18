@extends('layouts.app')
@section('title', 'Latest News')
@section('content')

<section class="w-11/12 mx-auto">
    <h3 class="my-4 text-3xl lg:text-5xl text-green-600 border-l-4 px-2 border-green-600">Latest News</h3>

    <div class="flex items-center">
        <span class="text-lg mr-2">Filter: </span>
         <div class="flex flex-wrap">
            <button
            class="p-1 px-2 border border-green-400 text-green-400 rounded-xl hover:bg-gray-800 hover:text-white text-sm my-2 mr-2"> <i class="fa fa-list"></i> All</button>
            <button
            class="p-1 px-2 border border-green-400 text-green-400 rounded-xl hover:bg-gray-800 hover:text-white text-sm my-2 mr-2">Programming</button>
            <button
            class="p-1 px-2 border border-green-400 text-green-400 rounded-xl hover:bg-gray-800 hover:text-white text-sm my-2 mr-2">Security</button>
            <button
            class="p-1 px-2 border border-green-400 text-green-400 rounded-xl hover:bg-gray-800 hover:text-white text-sm my-2 mr-2">AI</button>
        </div>
    </div>

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
                href="#">Next <i class="fa fa-arrow-right"></i></a></button>
    </div>
</section>

@endsection
