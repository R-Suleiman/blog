<div class="w-full flex items-center text-gray-700 px-2 mt-3">

    <button class="comment-like-btn {{ $comment->likesClass->where('likable_id', auth()->guard('admin')->check() ? auth()->guard('admin')->user()->id : auth()->guard('web')->user()->id)->where('likable_type', auth()->guard('admin')->check() ? 'App\Models\Admin' : 'App\Models\Admin')->isNotEmpty() ? 'liked' : '' }}" data-id="{{ $comment->id }}"><i class="far fa-heart"></i> <span class="comment-likes-count">{{ $comment->likes }}</span></button>

    <span class="mx-2"><i class="fa fa-reply"></i> {{ $comment->replies_count ? $comment->replies_count : $comment->replies->count() }}</span>
    <span class="reply-link cursor-pointer hover:text-gray-950" data-id="{{ $comment->id }}" data-author="{{ $comment->commentable->first_name }}">Reply</span>
</div>

