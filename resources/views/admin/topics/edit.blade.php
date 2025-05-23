@extends('layouts.admin')
@section('title', 'Forum Topics')
@section('content')

    <section class="w-11/12 mx-auto p-2">
        <h3 class="m-4 text-3xl text-gray-700">Topic Details</h3>
        <div class="w-full mx-auto border border-green-400 my-8 p-2 md:p-4 flex flex-col items-center">
            <h3 class="text-3xl text-green-400 font-semibold mb-4">Update Topic Details</h3>

            <form action="{{ route('admin.topic.update', ['topic' => $topic]) }}" method="POST" enctype="multipart/form-data"
            class="w-full p-2 my-4">
            @csrf
            @method('PUT')

                <div class="w-full p-2">
                    <label for="title" class="text-xl mb-2 text-gray-700">Topic title:</label>
                    <input type="text" name="title" value="{{ $topic->title }}"
                        class="w-full border border-green-400 text-lg p-2 outline-none">
                    @error('title')
                        <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full p-2">
                    <label for="category" class="text-xl mb-2 text-gray-700">Category:</label>
                    <select name="category" class="w-full border border-green-400 text-lg p-2 outline-none">
                        @foreach ($categories as $category)
                        <option value="{{ $category->category }}" {{ $topic->category->category === $category->category ? 'selected' : '' }}>{{ $category->category }}</option>
                        @endforeach
                    </select>

                    @error('category')
                        <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                    @enderror
                </div>

            <div class="w-full p-2">
                <label for="description" class="text-xl mb-2 text-gray-700">Description:</label>
                <textarea name="description" id="" rows="5" class="editor w-full border border-green-400 text-lg p-2 outline-none">
                {{ $topic->description }}
            </textarea>
                @error('description')
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
