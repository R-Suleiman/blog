<div class="comment-container w-full flex my-4" id="comment-{{ $comment->id }}">
    <div class="w-14 rounded-full border border-green-400 mr-2 h-fit">
        @if ($comment->commentable_type == 'App\Models\User')
            <a href="#"><img
                    src="{{ $comment->commentable->photo ? asset('/storage/images/profile/user/' . $comment->commentable->photo) : asset('img/user.avif') }}"
                    alt="author photo" class="object-center w-full rounded-full"></a>
        @elseif ($comment->commentable_type == 'App\Models\Admin')
            <a href="#"><img
                    src="{{ $comment->commentable->photo ? asset('/storage/images/profile/admin/' . $comment->commentable->photo) : asset('img/user.avif') }}"
                    alt="author photo" class="object-center w-full rounded-full"></a>
        @endif
    </div>
    <div class="comment-content flex flex-col">
        <div class="w-full flex items-center">
            <span class="text-gray-800 font-semibold">{{ $comment->commentable->first_name }}
                {{ $comment->commentable->last_name }}</span>
            <span class="mx-1">&#x1F784;</span>
            <span
                class="text-sm text-gray-600">{{ $comment->created_at->diffInDays(now()) > 7 ? $comment->created_at->format('F j, Y') : $comment->created_at->diffForHumans() }}</span>
        </div>
        <p class="my-1 text-gray-700 text-justify">{!! $comment->comment !!}</p>

        <x-comment-reactions :comment="$comment" />

        {{-- replies --}}
        @if ($comment->replies && $comment->replies->isNotEmpty())
            <div class="replies w-full my-1">
                <div class="flex items-center">
                    <div class="flex-grow border-t border-gray-400"></div>
                    <span class="toggle-replies mx-2 text-gray-700 cursor-pointer"><span id="reply-status">view</span> replies</span>
                    <div class="flex-grow border-t border-gray-400"></div>
                </div>

                <div class="w-full hidden" id="comment-replies">
                    @foreach ($comment->replies as $reply)
                        <x-comment :comment="$reply" />
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
