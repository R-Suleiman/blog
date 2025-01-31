@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')

    <section class="w-11/12 mx-auto p-2">
        <div class="flex flex-col md:flex-row items-center md:justify-between">
            <h4 class="text-2xl my-2">Search results for <span class="text-green-600">"{{ $search }}"</span></h4>
        </div>

        <div class="w-full lg:w-10/12 mx-auto">
            <form action="{{ route('admin.forum-search-results') }}" method="POST" class="w-full">
                @csrf
                <div class="w-full p-2 flex items-center">
                    <input type="text" name="search" placeholder="search a topic"
                        class="w-full border border-green-400 p-2 outline-none" required>
                    <button class="p-2 text-gray-800 bg-green-400 text-lg">Search</button>
                </div>
            </form>
        </div>

        <p>{{ $retultsCount }} Results found!</p>

        <div class="w-full mx-auto md:p-2 my-8">
            @if ($topics->count() > 0)
                @foreach ($topics as $topic)

                    <div class="w-full bg-green-50 p-2 my-2">
                        <div class="flex items-center">
                            <img src="{{ $topic->admin->photo ? asset('/storage/images/profile/admin/' . $topic->admin->photo) : asset('img/user.avif') }}" alt="" class="w-1/12 rounded-full mr-2">
                            <div class="flex flex-col">
                                <a href="{{ route('admin.guest-admin.show', $topic->admin) }}"><span class="text-xl font-semibold hover:text-green-600">{{ $topic->admin->first_name }}
                                    {{ $topic->admin->last_name }} </span></a>
                                <span class="text-sm"> {{ $topic->created_at->diffInDays(now()) > 7 ? $topic->created_at->format('F j, Y') : $topic->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <div class="my-2 px-2">
                            <span class="text-sm my-2 text-green-700">{{ $topic->category->category }}</span>
                            <h4 class="text-xl font-semibold hover:text-green-600"><a href="{{ route('admin.topic.show', ['topic' => $topic]) }}">{{ $topic->title }}</a>
                            </h4>
                        </div>

                        <x-topic-reactions :topic="$topic" />
                    </div>
                @endforeach
            @else
                <div>
                    <p class="p-2 text-lg bg-green-300 border-l-4 border-green-600">No results found!</p>
                </div>
            @endif

            <div class="my-2">
                {{ $topics->links() }}
            </div>
        </div>
    </section>
@endsection
