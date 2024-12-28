@extends('layouts.admin')
@section('title', 'Profile')
@section('content')

    <section class="w-11/12 mx-auto p-2">
        <h3 class="m-4 text-3xl text-gray-700">Posts Management</h3>
        <div class="w-full mx-auto border border-green-400 my-8 p-2 md:p-4 flex flex-col items-center">
            <h3 class="text-3xl text-green-400 font-semibold mb-4">Create new Post</h3>

            <form action="{{ route('admin.post.store', ['which_posts' => $which_posts]) }}" method="POST" enctype="multipart/form-data"
                class="w-full p-2 my-4">
                @csrf

                    <div class="w-full p-2">
                        <label for="title" class="text-xl mb-2 text-gray-700">Post title:</label>
                        <input type="text" name="title" value="{{ old('title') }}"
                            class="w-full border border-green-400 text-lg p-2 outline-none">
                        @error('title')
                            <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full p-2">
                        <label for="category" class="text-xl mb-2 text-gray-700">Category:</label>
                        <select name="category" class="w-full border border-green-400 text-lg p-2 outline-none">
                            @foreach ($categories as $category)
                            <option value="{{ $category->category }}">{{ $category->category }}</option>
                            @endforeach
                        </select>

                        @error('category')
                            <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full p-2">
                        <label for="topic" class="text-xl mb-2 text-gray-700">Topic:</label>
                        <input type="text" name="topic" value="{{ old('topic') }}" placeholder="eg. food, health, or agriculture, etc."
                            class="w-full border border-green-400 text-lg p-2 outline-none">
                        @error('topic')
                            <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                        @enderror
                    </div>

                <div class="w-full p-2">
                    <label for="description" class="text-xl mb-2 text-gray-700">Description:</label>
                    <textarea name="description" id="" rows="5" class="w-full border border-green-400 text-lg p-2 outline-none">
                    {{ old('description') }}
                </textarea>
                    @error('description')
                        <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full p-2">
                    <label for="file_type" class="text-xl mb-2 text-gray-700">File type:</label>
                    <select name="file_type" class="w-full border border-green-400 text-lg p-2 outline-none">
                        <option value="">-- select --</option>
                        <option value="Image">Image</option>
                        <option value="Video">Video</option>
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
                </div>

                <div class="w-full p-2">
                    <div>
                        <span class="text-lg text-gray-700">Feature this post:</span>
                        <input type="checkbox" name="featured" class="border border-green-400 text-xl p-2 outline-none mx-2">
                    </div>

                    @error('featured')
                        <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full p-2">
                    <button
                        class="py-1 px-4 border border-green-400 text-green-400 text-lg rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2">Post</button>
                </div>
            </form>

        </div>
    </section>

@endsection
