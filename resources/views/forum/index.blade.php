@extends('layouts.app')
@section('title', 'Forum')
@section('content')

    {{-- Hero --}}
    <section class="relative w-full bg-gray-700 bg-center bg-cover bg-no-repeat h-60"
        style="background-image: url('img/tech1.png')">
        <div class="overlay w-full p-12">
            <h2 class="text-3xl md:text-5xl text-white my-2 mr-2">Forum</h2>
        </div>
    </section>

    <section class="w-11/12 mx-auto my-4 md:p-8">
        <h4 class="text-xl">Welcome to <span class="text-green-600 font-semibold">Mwanateknolojia</span>'s forum.</h4>
        <p class="text-lg my-4 text-justify">
            This is a platform made for users to exchange their ideas on various topics.
            Different topics will be hosted by the creators, and users will be able to comment and discuss their ideas.
            You have any thought for a certain topic that you think people need to know? or you are keen to share your view on various world topics? Do you want to speak so that your voice will be heard out in the world? this is the place.
            Welcome, and together, let's <span class="text-green-600">Speak!</span>
        </p>

        <p class="text-lg my-4">You will need to login to participate in the forum</p>

        <div>
            @if (Auth::guard('admin')->check() || Auth::guard('web')->check())
                    <a href="{{ route('forum-topics') }}"><button
                            class="py-1 px-4 border border-green-400 text-green-400 text-lg rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2">Proceed to the forum <i class="fa fa-arrow-right"></i></button></a>
                @else
                <button
                class="py-1 px-4 border border-green-400 text-green-400 text-lg rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2"><a
                    href="{{ route('login') }}">Sign In</a></button>
                @endif
        </div>
    </section>
@endsection
