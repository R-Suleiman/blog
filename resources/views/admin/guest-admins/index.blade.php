@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')

    <section class="w-11/12 mx-auto p-2">
        <div class="flex flex-col md:flex-row items-center md:justify-between">
            <h3 class="m-4 text-3xl text-gray-700">Admins Management</h3>
            <a href="{{ route('admin.guest-admin.create') }}">
                <button
            class="py-1 px-4 border border-green-400 text-green-400 text-lg rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2">Register Admin</button>
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
                           Photo
                        </th>
                        <th class="px-4 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                            First Name
                        </th>
                        <th class="px-4 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                            Last Name
                        </th>
                        <th class="px-4 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                            Title
                        </th>
                        <th class="px-4 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                            Email
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
                    @if ($admins->count() > 0)
                        @foreach ($admins as $admin)
                            <tr>
                                <td class="px-4 py-4 text-sm text-gray-800">
                                     {!! $admin->rank == 1 ? '<i class="fa fa-shield text-green-600 mr-2"></i>' : '' !!} {{ $count++ }}.
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-800">
                                    <img src="{{ $admin->photo ? asset('/storage/images/profile/admin/' . $admin->photo) : asset('img/user.avif') }}" alt="author photo" class="w-16 object-center rounded-full">
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-800">
                                    {{ $admin->first_name }}
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-800">
                                    {{ $admin->last_name }}
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-800">
                                    {{ $admin->title }}
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-800">
                                    {{ $admin->email }}
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-800">
                                    <a href="{{ route('admin.guest-admin.show', $admin) }}">
                                        <button
                                        class="py-1 px-4 border border-green-400 text-green-400 text-lg rounded-xl hover:bg-gray-800 hover:text-white my-2 mr-2">View</button>
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="px-4 py-4 text-sm text-gray-800 text-center" colspan="4">
                                No Admins Found!
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </section>
@endsection
