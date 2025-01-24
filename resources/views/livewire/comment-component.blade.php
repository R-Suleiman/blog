@props(['topic_id'])

<div class="w-full">
    <div class="w-full border border-green-400 p-4">
        <h3 class="font-semibold text-2xl mb-4">Conversations</h3>

        <div class="w-full">
            @foreach ($conversation as $comment)
            <div class="w-full flex my-2">
                <div class="w-14 rounded-full border border-green-400 mr-2 h-fit">
                    <a href="#"><img src="{{ asset('img/user.avif') }}" alt="author photo"
                            class="object-center w-full rounded-full"></a>
                </div>
                <div class="flex flex-col">
                    <div class="w-full flex flex-col">
                        <span class="mr-2 text-gray-800 font-semibold">{{ $comment['commentable']->first_name }} {{ $comment['commentable']->last_name }}</span>
                        <span class="text-sm text-gray-600">{{ $comment['created_at']->diffInDays(now()) > 7 ? $comment['created_at']->format('F j, Y') : $comment['created_at']->diffForHumans() }}</span>
                    </div>
                    <p class="my-2 text-gray-700 text-justify">{!! $comment['comment'] !!}</p>
                    <div class="text-gray-700 mb-3">
                        <span><a href="#">Reply</a></span>
                        <span class="mx-2"><i class="far fa-heart"></i> {{ $comment['likes'] }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="w-full mt-8">
            <form wire:submit.prevent="addComment">
                <div class="w-full p-2">
                    <input type="hidden" wire:model="topic_id" value="{{ $topic_id }}">
                    <textarea wire:model="comment" name="" cols="30" rows="5" placeholder="Add a comment"
                        class="w-full border border-green-400 text-lg p-2 outline-none"></textarea>
                    <button class="p-2 text-gray-800 bg-green-400 text-lg my-2">Comment</button>
                </div>
            </form>
        </div>
    </div>
</div>
