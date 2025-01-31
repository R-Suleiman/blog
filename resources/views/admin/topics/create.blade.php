@extends('layouts.admin')
@section('title', 'Profile')
@section('content')

    <section class="w-11/12 mx-auto p-2">
        <h3 class="m-4 text-3xl text-gray-700">Forum Topics Management</h3>
        <div class="w-full mx-auto border border-green-400 my-8 p-2 md:p-4 flex flex-col items-center">
            <h3 class="text-3xl text-green-400 font-semibold mb-4">Create new Post</h3>

            <form action="{{ route('admin.topic.store') }}" method="POST" enctype="multipart/form-data"
                class="w-full p-2 my-4">
                @csrf

                    <div class="w-full p-2">
                        <label for="title" class="text-xl mb-2 text-gray-700">Topic title:</label>
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
                    <label for="description" class="text-xl mb-2 text-gray-700">Description:</label>
                    <textarea name="description" id="" rows="5" class="w-full border border-green-400 text-lg p-2 outline-none">
                    {{ old('description') }}
                </textarea>
                    @error('description')
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
