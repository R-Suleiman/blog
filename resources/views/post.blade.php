@extends('layouts.app')
@section('title', 'Post')
@section('content')

    <section class="w-full">
        <div class="w-11/12 md:w-9/12 mx-auto my-8 md:p-8">
            <div class="w-full flex items-center justify-between">
                <span class="bg-green-400 text-gray-800 py-1 px-4 text-lg">Programming</span>
                <span class="text-gray-500">Posted on: 12:00 am, 12/12/2023</span>
            </div>
            <div class="w-full overflow-hidden my-2">
                <img src="{{ asset('img/tech1.png') }}" alt="post image" class="w-full object-fill">
            </div>
            <div class="w-full flex items-center my-4">
                <div class="w-16 rounded-full border border-green-400"><img src="{{ asset('img/user.avif') }}"
                        alt="author photo" class="object-center w-full rounded-full"></div>
                <span class="mx-2 text-lg text-gray-700 hover:text-green-400"><a href="#">Jane Doe</a></span>
            </div>
            <div class="w-full my-4">
                <p class="text-lg text-gray-700 text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Cupiditate rem, officia minus rerum praesentium totam odit, et ex ut soluta eius omnis porro similique
                    repellendus nulla aspernatur dolore perferendis facere.
                    Laboriosam sequi illum dolorum dolore aperiam sapiente quam necessitatibus ratione et exercitationem
                    voluptas, eveniet nesciunt animi est repudiandae accusamus, eos quibusdam? Dolorem sunt blanditiis,
                    neque in aliquam adipisci totam ipsam!
                    Corrupti, praesentium voluptas quam corporis sapiente fugiat itaque perferendis quae eaque, distinctio
                    quidem, iusto libero in officiis? Illo fugit ex corrupti voluptatibus. Quidem fugiat magni inventore,
                    fugit iusto voluptas quam.
                    Ut hic minima sunt porro ipsum ipsa, tenetur fuga deserunt quo dignissimos odit dicta doloribus. Debitis
                    eum praesentium expedita sed tempore rem consectetur provident voluptate numquam. Eveniet ratione sequi
                    nam!</p>
                <p class="text-lg text-gray-700 text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Cupiditate rem, officia minus rerum praesentium totam odit, et ex ut soluta eius omnis porro similique
                    repellendus nulla aspernatur dolore perferendis facere.
                    Laboriosam sequi illum dolorum dolore aperiam sapiente quam necessitatibus ratione et exercitationem
                    voluptas, eveniet nesciunt animi est repudiandae accusamus, eos quibusdam? Dolorem sunt blanditiis,
                    neque in aliquam adipisci totam ipsam!
                    Corrupti, praesentium voluptas quam corporis sapiente fugiat itaque perferendis quae eaque, distinctio
                    quidem, iusto libero in officiis? Illo fugit ex corrupti voluptatibus. Quidem fugiat magni inventore,
                    fugit iusto voluptas quam.
                    Ut hic minima sunt porro ipsum ipsa, tenetur fuga deserunt quo dignissimos odit dicta doloribus. Debitis
                    eum praesentium expedita sed tempore rem consectetur provident voluptate numquam. Eveniet ratione sequi
                    nam!</p>
            </div>
            <div class="w-full my-8 flex items-center">
                <span class="text-lg mr-2">More Topics: </span>
                <div class="flex flex-wrap">
                    <button
                        class="p-1 px-2 border border-green-400 text-green-400 rounded-xl hover:bg-gray-800 hover:text-white text-sm my-2 mr-2">Programming</button>
                    <button
                        class="p-1 px-2 border border-green-400 text-green-400 rounded-xl hover:bg-gray-800 hover:text-white text-sm my-2 mr-2">Security</button>
                    <button
                        class="p-1 px-2 border border-green-400 text-green-400 rounded-xl hover:bg-gray-800 hover:text-white text-sm my-2 mr-2">AI</button>
                </div>
            </div>

            {{-- comments --}}
            <div class="w-full">
                <div class="w-full border border-green-400 p-4">
                    <h3 class="font-semibold text-2xl mb-4">Conversations</h3>

                    <div class="w-full">
                        <div class="w-full flex my-2">
                            <div class="w-32 md:w-24 rounded-full border border-green-400 mr-2 h-fit">
                                <a href="#"><img src="{{ asset('img/user.avif') }}" alt="author photo"
                                        class="object-center w-full rounded-full"></a>
                            </div>
                            <div class="flex flex-col">
                                <div class="w-full flex items-center text-sm text-gray-700">
                                    <span class="mr-2 hover:text-green-400"><a href="#">Jane Doe</a></span>
                                    <span>13:00 - 12/12/2023</span>
                                </div>
                                <p class="my-2 text-gray-700 text-justify">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Labore laboriosam reprehenderit saepe asperiores deleniti, maxime id.
                                    Quas nostrum velit expedita enim optio non, ullam eius, repellat, asperiores dolor
                                    consequatur fuga!</p>
                            </div>
                        </div>
                        <div class="w-full flex my-2">
                            <div class="w-32 md:w-24 rounded-full border border-green-400 mr-2 h-fit">
                                <a href="#"><img src="{{ asset('img/user.avif') }}" alt="author photo"
                                        class="object-center w-full rounded-full"></a>
                            </div>
                            <div class="flex flex-col">
                                <div class="w-full flex items-center text-sm text-gray-700">
                                    <span class="mr-2 hover:text-green-400"><a href="#">Jane Doe</a></span>
                                    <span>13:00 - 12/12/2023</span>
                                </div>
                                <p class="my-2 text-gray-700 text-justify">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Labore laboriosam reprehenderit saepe asperiores deleniti, maxime id.
                                    Quas nostrum velit expedita enim optio non, ullam eius, repellat, asperiores dolor
                                    consequatur fuga!</p>
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
            </div>

            {{-- related --}}
            <div class="w-full mt-8">
                <h3 class="my-2 lg:text-2xl text-green-600 border-l-4 px-2 border-green-600">Related Posts</h3>

                <div class="w-full my-4 flex flex-col md:flex-row flex-wrap">
                    <div class="w-full md:w-1/2 lg:w-1/4 my-2">
                        <div class="w-11/12 mx-auto">
                            <div class="h-42 overflow-hidden bg-green-600 mb-2"><a href="#"><img
                                        src="{{ asset('img/tech1.png') }}" alt=""
                                        class="object-fit transition scale-110 hover:scale-100"></a></div>
                            <div>
                                <span class="text-gray-700">Machine Learning</span>
                                <h4 class="text-lg text-gray-800 hover:text-green-400"><a href="#">The most advanced
                                        AI
                                        model in History developed</a></h4>
                                <span class="my-2 text-gray-700">Jane Doe - 21 minutes ago</span>
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/4 my-2">
                        <div class="w-11/12 mx-auto">
                            <div class="h-42 overflow-hidden bg-green-600 mb-2"><a href="#"><img
                                        src="{{ asset('img/tech1.png') }}" alt=""
                                        class="object-fit transition scale-110 hover:scale-100"></a></div>
                            <div>
                                <span class="text-gray-700">Machine Learning</span>
                                <h4 class="text-lg text-gray-800 hover:text-green-400"><a href="#">The most advanced
                                        AI
                                        model in History developed</a></h4>
                                <span class="my-2 text-gray-700">Jane Doe - 21 minutes ago</span>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-1/4 my-2">
                        <div class="w-11/12 mx-auto">
                            <div class="h-42 overflow-hidden bg-green-600 mb-2"><a href="#"><img
                                        src="{{ asset('img/tech1.png') }}" alt=""
                                        class="object-fit transition scale-110 hover:scale-100"></a></div>
                            <div>
                                <span class="text-gray-700">Machine Learning</span>
                                <h4 class="text-lg text-gray-800 hover:text-green-400"><a href="#">The most advanced
                                        AI
                                        model in History developed</a></h4>
                                <span class="my-2 text-gray-700">Jane Doe - 21 minutes ago</span>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-1/4 my-2">
                        <div class="w-11/12 mx-auto">
                            <div class="h-42 overflow-hidden bg-green-600 mb-2"><a href="#"><img
                                        src="{{ asset('img/tech1.png') }}" alt=""
                                        class="object-fit transition scale-110 hover:scale-100"></a></div>
                            <div>
                                <span class="text-gray-700">Machine Learning</span>
                                <h4 class="text-lg text-gray-800 hover:text-green-400"><a href="#">The most advanced
                                        AI
                                        model in History developed</a></h4>
                                <span class="my-2 text-gray-700">Jane Doe - 21 minutes ago</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
