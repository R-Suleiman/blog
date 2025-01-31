<div class="w-full flex items-center text-gray-700 px-2 mt-3">

    <button class="like-btn {{ $topic->likesClass->where('likable_id', auth()->guard('admin')->check() ? auth()->guard('admin')->user()->id : auth()->guard('web')->user()->id)->where('likable_type', auth()->guard('admin')->check() ? 'App\Models\Admin' : 'App\Models\Admin')->isNotEmpty() ? 'liked' : '' }}" data-id="{{ $topic->id }}"><i class="far fa-heart"></i> <span class="likes-count">{{ $topic->likes }}</span></button>

    <span class="mx-3"><i class="far fa-comment"></i>
        {{ $topic->comments->count() }}</span>
    {{-- <span><i class="far fa-eye"></i>
        5</span> --}}
</div>
