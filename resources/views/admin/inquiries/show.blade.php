@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')

    <section class="w-11/12 mx-auto p-2">
        <div class="w-full">

            <div class="w-full bg-green-50 p-4 my-2">
                    <div class="w-full flex flex-col">
                        <span class="text-xl font-semibold hover:text-green-600">Name: {{ $inquiry->first_name }}
                            {{ $inquiry->last_name }}</span>
                        <span class="text-gray-700 italic">Email: {{ $inquiry->email }}</span>
                    </div>

                <div class="w-full my-4">
                    <div class="flex items-center mb-2">
                        <i class="far fa-clock"></i>
                        <span class="mx-1"> {{ $inquiry->created_at->diffInDays(now()) > 7 ? $inquiry->created_at->format('F j, Y') : $inquiry->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="my-4">
                        <p class="text-lg text-gray-600 text-justify">
                            {{ $inquiry->message }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
