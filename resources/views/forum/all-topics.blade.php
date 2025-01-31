@extends('layouts.app')
@section('title', 'Forum Topics')
@section('content')

    <section class="w-11/12 mx-auto my-4">
        <h2 class="text-2xl text-center"><span class="text-green-600">Mwanateknolojia</span> Forum</h2>

        <div class="w-full lg:w-10/12 mx-auto">
            <form action="{{ route('forum-search-result') }}" method="POST" class="w-full">
                @csrf
                <div class="w-full p-2 flex items-center">
                    <input type="text" name="search" placeholder="search a topic"
                        class="w-full border border-green-400 p-2 outline-none" required>
                    <button class="p-2 text-gray-800 bg-green-400 text-lg">Search</button>
                </div>
            </form>
        </div>

        <div class="w-full mb-4 flex flex-wrap justify-center">
            @foreach ($categories as $category)
                <button
                    class="py-1 px-4 border border-green-400 text-green-400 rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2 text-sm"><a
                        href="{{ route('forum-category-topics', $category->category) }}">{{ $category->category }}</a></button>
            @endforeach
        </div>

        <div class="w-full my-8">
            <h3 class="my-4 text-xl lg:text-2xl text-green-600 border-l-4 px-2 border-green-600">All Topics</h3>
            <div class="w-full">
                @foreach ($topics as $topic)
                    <div class="w-full bg-green-50 p-2 my-2">
                        <div class="flex items-center">
                            <img src="{{ $topic->admin->photo ? asset('/storage/images/profile/admin/' . $topic->admin->photo) : asset('img/user.avif') }}"
                                alt="" class="w-1/12 rounded-full mr-2">
                            <div class="flex flex-col">
                                <a href="{{ route('author', [$topic->admin->first_name, $topic->admin->last_name]) }}"><span
                                        class="text-xl font-semibold hover:text-green-600">{{ $topic->admin->first_name }}
                                        {{ $topic->admin->last_name }}</span></a>
                                <span
                                    class="text-sm">{{ $topic->created_at->diffInDays(now()) > 7 ? $topic->created_at->format('F j, Y') : $topic->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <div class="my-2 px-2">
                            <span class="text-sm my-2 text-green-700">{{ $topic->category->category }}</span>
                            <h4 class="text-xl font-semibold hover:text-green-600"><a
                                    href="{{ route('forum-topic', $topic->id) }}">{{ $topic->title }}</a>
                            </h4>
                        </div>

                        <x-topic-reactions :topic="$topic" />
                    </div>
                @endforeach
            </div>

            <div class="w-full my-2">
                {{ $topics->links() }}
            </div>
        </div>
    </section>

@endsection
