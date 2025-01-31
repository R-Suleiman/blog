@extends('layouts.app')
@section('title', 'Forum Topics')
@section('content')

    <section class="w-11/12 mx-auto my-4">
        <h2 class="text-3xl">{{ $category }} Topics</h2>

        <div class="w-full flex flex-col md:flex-row">
            <div class="w-full md:w-2/3 md:pr-4">
                <div class="w-full my-8">
                    <div class="w-full">
                        @if ($topics->count() > 0)
                            @foreach ($topics as $topic)
                                <div class="w-full bg-green-50 p-2 my-2">
                                    <div class="flex items-center">
                                        <img src="{{ $topic->admin->photo ? asset('/storage/images/profile/admin/' . $topic->admin->photo) : asset('img/user.avif') }}"
                                            alt="" class="w-1/12 rounded-full mr-2">
                                        <div class="flex flex-col">
                                            <a
                                                href="{{ route('author', [$topic->admin->first_name, $topic->admin->last_name]) }}"><span
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
                            @else
                            <div>No Topics found under this category</div>
                        @endif

                    </div>
                </div>

                <div class="w-full mb-4 flex items-center">
                    <span class="text-lg mr-2">Other Categories: </span>
                    @foreach ($categories as $category)
                        <button
                            class="py-1 px-4 border border-green-400 text-green-400 rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2 text-sm"><a
                                href="{{ route('forum-category-topics', $category->category) }}">{{ $category->category }}</a></button>
                    @endforeach
                </div>
            </div>

            <div class="w-full md:w-1/3 md:pl-4">
                <h3 class="my-4 text-lg lg:text-2xl text-green-600 border-l-4 px-2 border-green-600">Discover More Topics
                </h3>

                <div class="w-full my-4 md:my-0">
                    @foreach ($otherTopics as $topic)
                    <div class="border-b border-gray-300 my-2">
                        <span class="text-sm text-green-600">{{ $topic->category->category }}</span>
                        <h4 class="text-lg font-semibold hover:text-green-600"><a
                                href="{{ route('forum-topic', $topic->id) }}">{{ $topic->title }}</a></h4>
                        <div class="flex text-sm text-gray-500">
                            <span class="hover:text-green-600">{{ $topic->admin->first_name }}
                                {{ $topic->admin->last_name }}</span><span class="mx-2">-</span>
                            <span>{{ $topic->created_at->diffInDays(now()) > 7 ? $topic->created_at->format('F j, Y') : $topic->created_at->diffForHumans() }}</span>
                        </div>

                        <x-topic-reactions :topic="$topic" />
                    </div>
                @endforeach
                </div>
            </div>
        </div>

    </section>
@endsection
