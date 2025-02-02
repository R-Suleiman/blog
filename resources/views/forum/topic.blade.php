@extends('layouts.app')
@section('title', 'Forum Topic')
@section('content')

    <section class="w-11/12 mx-auto my-4">
        <div class="w-full bg-green-50 p-4 my-2">
            <div class="flex items-center">
                <img src="{{ $topic->admin->photo ? asset('/storage/images/profile/admin/' . $topic->admin->photo) : asset('img/user.avif') }}" alt="" class="w-1/12 rounded-full mr-2">
                <div class="flex flex-col">
                    <a href="{{ route('author', [$topic->admin->first_name, $topic->admin->last_name]) }}"><span class="text-xl font-semibold hover:text-green-600">{{ $topic->admin->first_name }}
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
                        {{ $topic->description }}
                    </p>
                </div>

                <div class="flex flex-col md:flex-row items-center justify-between">
                    <x-topic-reactions :topic="$topic" />
                    <x-post-share />
                </div>
            </div>

        </div>
        {{-- comments --}}
        <div class="w-full">
            <div class="w-full border border-green-400 p-4">
                <h3 class="font-semibold text-2xl mb-4">Conversations</h3>

                <div class="w-full" id="comments-section">
                    @if ($comments->count() > 0)
                    @foreach ($comments as $comment)
                    <x-comment :comment="$comment" />
                    @endforeach
                    @else
                    <div><p class="text-lg text-gray-600 text-center">No comments yet. Be the first to share your thoughts.</p></div>
                    @endif
                </div>

                <div class="w-full mt-8">
                    <form id="comment-form">
                        <div class="w-full p-2">
                            <span id="reply-indicator" class="my-1 text-green-600 font-semibold"></span>
                            <input type="hidden" name="topic_id" value="1">
                            <textarea name="comment" id="comment-input" cols="30" rows="5" placeholder="Add a comment"
                                class="w-full border border-green-400 text-lg p-2 outline-none"></textarea>
                            <button class="p-2 text-gray-800 bg-green-400 hover:bg-green-700 hover:text-white text-lg my-2" type="submit">Comment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- @livewire('comment-component', ['topic_id' => 1]) --}}

         {{-- related --}}
         <div class="w-full mt-8">
            <h3 class="my-2 lg:text-2xl text-green-600 border-l-4 px-2 border-green-600">Related Topics</h3>

            <div class="w-full my-4 flex flex-col md:flex-row flex-wrap">
                @foreach ($relatedTopics as $topic)
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
                        <h4 class="text-xl font-semibold hover:text-green-600"><a href="{{ route('forum-topic', $topic->id) }}">{{ $topic->title }}</a>
                        </h4>
                    </div>

                    <x-topic-reactions :topic="$topic" />
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <script src="../../js/forum.js" type="module"></script>
@endsection
