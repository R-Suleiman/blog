@extends('layouts.admin')
@section('title', 'Profile')
@section('content')

    <section class="w-11/12 mx-auto p-2">
        <h3 class="m-4 text-3xl text-gray-700">Posts Details</h3>
        <div class="w-full mx-auto border border-green-400 my-8 p-2 md:p-4 flex flex-col items-center">
            <h3 class="text-3xl text-green-400 font-semibold mb-4">Update Post Details</h3>

            <form action="{{ route('admin.post.update', ['post' => $post]) }}" method="POST" enctype="multipart/form-data"
            class="w-full p-2 my-4">
            @csrf
            @method('PUT')
                <div class="w-full p-2">
                    <label for="title" class="text-xl mb-2 text-gray-700">Post title:</label>
                    <input type="text" name="title" value="{{ $post->title }}"
                        class="w-full border border-green-400 text-lg p-2 outline-none">
                    @error('title')
                        <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full p-2">
                    <label for="category" class="text-xl mb-2 text-gray-700">Category:</label>
                    <select name="category" class="w-full border border-green-400 text-lg p-2 outline-none">
                        @foreach ($categories as $category)
                        <option value="{{ $category->category }}" {{ $post->category->category === $category->category ? 'selected' : '' }}>{{ $category->category }}</option>
                        @endforeach
                    </select>

                    @error('category')
                        <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full p-2">
                    <label for="topic" class="text-xl mb-2 text-gray-700">Topic:</label>
                    <input type="text" name="topic" value="{{ $post->topic }}" placeholder="eg. food, health, or agriculture, etc."
                        class="w-full border border-green-400 text-lg p-2 outline-none">
                    @error('topic')
                        <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                    @enderror
                </div>

            <div class="w-full p-2">
                <label for="description" class="text-xl mb-2 text-gray-700">Description:</label>
                <textarea name="description" id="" rows="5" class="w-full border border-green-400 text-lg p-2 outline-none">
                {{ $post->description }}
            </textarea>
                @error('description')
                    <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-full p-2">
                <label for="file_type" class="text-xl mb-2 text-gray-700">File type:</label>
                <select name="file_type" class="w-full border border-green-400 text-lg p-2 outline-none">
                    <option value="Image" {{ $post->file_type == 'Image' ? 'selected' : '' }}>Image</option>
                    <option value="Video" {{ $post->file_type == 'Video' ? 'selected' : '' }}>Video</option>
                </select>

                @error('file_type')
                    <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-full p-2">
                <label for="file" class="text-xl mb-2 text-gray-700">File:</label>
                <input type="file" name="file" class="w-full border border-green-400 text-lg p-2 outline-none">

                @error('file')
                    <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                @enderror

                <div class="w-full md:w-2/4 mx-auto h-64 my-4">
                    <img src="{{ asset('/storage/files/posts/' . $post->file) }}" alt="" class="w-full rounded-md object-cover h-full">
                </div>
            </div>

            <div class="w-full p-2">
                <div>
                    <span class="text-lg text-gray-700">Feature this post:</span>
                    <input type="checkbox" name="featured" class="border border-green-400 text-xl p-2 outline-none mx-2" {{ $post->featured == 1 ? 'checked' : ''}}>
                </div>

                @error('featured')
                    <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-full p-2">
                <button
                    class="py-1 px-4 border border-green-400 text-green-400 text-lg rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2">Save</button>
            </div>
        </form>

        </div>
    </section>

@endsection
