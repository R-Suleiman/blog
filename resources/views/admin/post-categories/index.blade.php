@extends('layouts.admin')
@section('title', 'Posts Management')
@section('content')

    <section class="w-11/12 mx-auto p-2">
        <div class="flex flex-col md:flex-row items-center md:justify-between">
            <h3 class="m-4 text-3xl text-gray-700">Post categories Management</h3>
            <a href="{{ route('admin.post-category.create') }}">
                <button
            class="py-1 px-4 border border-green-400 text-green-400 text-lg rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2">Add Category</button>
            </a>
        </div>

        <div class="w-full overflow-x-auto my-4">
            <table class="min-w-full divide-y divide-gray-200 table-auto">
                <thead class="bg-gray-500 whitespace-nowrap">
                    <tr>
                        <th class="px-4 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                            s/n
                        </th>
                        <th class="px-4 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                           Category
                        </th>
                        <th class="px-4 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                            Action
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200 whitespace-nowrap">
                    @php
                        $count = 1;
                    @endphp
                    @if ($categories->count() > 0)
                        @foreach ($categories as $category)
                            <tr>
                                <td class="px-4 py-4 text-sm text-gray-800">
                                      {{ $count++ }}.
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-800">
                                    {{ $category->category }}
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-800 flex items-center">
                                    <form action="{{ route('admin.post-category.destroy', $category) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                class="py-1 px-4 border border-red-600 text-red-600 text-lg rounded-xl hover:bg-red-800 hover:text-white my-2 mr-2" onclick="return confirm('Are you sure you want to remove this category')">Delete</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="px-4 py-4 text-sm text-gray-800 text-center" colspan="4">
                                No Category Found!
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </section>
@endsection
