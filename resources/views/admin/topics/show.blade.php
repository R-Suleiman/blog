@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')

    <section class="w-11/12 mx-auto p-2">
        <div class="w-full">

            <div class="w-fit mb-4 ml-auto flex flex-col md:flex-row items-center">
                <button
                    class="py-1 px-4 border border-green-400 text-green-400 text-lg rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2"><a
                        href="{{ route('admin.topic.edit', ['topic' => $topic]) }}">Edit Topic</a></button>

                <form action="{{ route('admin.topic.destroy', ['topic' => $topic]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button
                        class="delete-btn py-1 px-4 border border-red-600 text-red-600 text-lg rounded-xl hover:bg-red-800 hover:text-white my-2 mr-2"
                       >Delete Topic</button>
                </form>
            </div>

            <div class="w-full bg-green-50 p-4 my-2">
                <div class="flex items-center">
                    <img src="{{ $topic->admin->photo ? asset('/storage/images/profile/admin/' . $topic->admin->photo) : asset('img/user.avif') }}" alt="" class="w-1/12 rounded-full mr-2">
                    <div class="flex flex-col">
                        <a href="{{ route('admin.guest-admin.show', $topic->admin) }}"><span class="text-xl font-semibold hover:text-green-600">{{ $topic->admin->first_name }}
                            {{ $topic->admin->last_name }}</span></a>
                        <span class="text-gray-700 italic">{{ $topic->admin->title }}</span>
                    </div>
                </div>

                <div class="w-full my-4">
                    <div class="flex items-center mb-2">
                        <i class="far fa-clock"></i>
                        <span class="mx-1"> {{ $topic->created_at->diffInDays(now()) > 7 ? $topic->created_at->format('F j, Y') : $topic->created_at->diffForHumans() }}</span>
                    </div>
                    <span class="text-green-700 text-lg">{{ $topic->category->category }}</span>
                    <h2 class="mb-4 text-2xl font-semibold">{{ $topic->title }}</h2>

                    <div class="my-4">
                        <p class="text-lg text-gray-600 text-justify">
                            {!! $topic->description !!}
                        </p>
                    </div>

                    <x-topic-reactions :topic="$topic" />
                </div>

            </div>
        </div>
    </section>

@endsection
