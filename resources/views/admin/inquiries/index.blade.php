@extends('layouts.admin')
@section('title', 'inquiries')
@section('content')

    <section class="w-11/12 mx-auto p-2">
        <div class="flex flex-col md:flex-row items-center md:justify-between">
            <h3 class="m-4 text-3xl text-gray-700">Contact Inquiries Management</h3>
        </div>

        <div class="w-full overflow-x-auto my-4">
            <table class="min-w-full divide-y divide-gray-200 table-auto">
                <thead class="bg-gray-500 whitespace-nowrap">
                    <tr>
                        <th class="px-4 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                            s/n
                        </th>
                        <th class="px-4 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                           First Name
                        </th>
                        <th class="px-4 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                            Last Name
                        </th>
                        <th class="px-4 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                            Email
                        </th>
                        <th class="px-4 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                            Message
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
                    @if ($inquiries->count() > 0)
                        @foreach ($inquiries as $inquiry)
                            <tr>
                                <td class="px-4 py-4 text-sm text-gray-800">
                                      {{ $count++ }}.
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-800">
                                    {{ $inquiry->first_name }}
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-800">
                                    {{ $inquiry->last_name }}
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-800">
                                    {{ $inquiry->email }}
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-800">
                                    {{ Str::words($inquiry->message, 20, '...') }}
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-800 flex items-center">
                                    <button
                                class="py-1 px-4 border border-green-600 text-green-600 text-lg rounded-xl hover:bg-green-800 hover:text-white my-2 mr-2"><a href="{{ route('admin.inquiry.show', $inquiry) }}">View</a></button>
                                    <form action="{{ route('admin.inquiry.destroy', $inquiry) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                class="delete-btn py-1 px-4 border border-red-600 text-red-600 text-lg rounded-xl hover:bg-red-800 hover:text-white my-2 mr-2">Delete</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="px-4 py-4 text-sm text-gray-800 text-center" colspan="4">
                                No inquiry Found!
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </section>
@endsection
