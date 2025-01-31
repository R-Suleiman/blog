@extends('layouts.app')
@section('title', 'Contact Us')
@section('content')

    {{-- Hero --}}
    <section class="relative w-full bg-gray-700 bg-center bg-cover bg-no-repeat h-60"
        style="background-image: url('img/tech1.png')">
        <div class="overlay w-full p-12">
            <h2 class="text-3xl md:text-5xl text-white my-2 mr-2">Contact Us</h2>
        </div>
    </section>

    <section class="w-11/12 mx-auto my-4 md:p-8">
        <div class="w-full">
           <p class="text-lg text-gray-700 text-justify"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. A rerum soluta illum debitis facilis, repudiandae adipisci numquam consequuntur ad amet quae dolores voluptatibus, asperiores eos illo itaque culpa doloremque ipsam.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum, quisquam ab ad ducimus a pariatur, quam non delectus possimus libero consectetur provident. Totam placeat adipisci, enim dolor mollitia porro asperiores.</p>
        </div>

        <div class="w-full my-4">
            <div class="flex items-center text-lg"><i class="fa fa-envelope text-green-400 mr-2"></i> <span class="text-gray-700 hover:text-green-400"><a href="#">blog@Mwanateknolojia.com</a></span></div>
        </div>

        {{-- inquiries --}}
        <div class="w-full md:w-11/12 mx-auto border border-green-400 p-4 my-8">
            <h3 class="font-semibold text-2xl mb-4">For Inquiries</h3>

                <form action="{{ route('inquiries') }}" method="POST" class="w-full mt-8">
                    @csrf
                    <div class="w-full p-2">
                        <label for="first_name" class="text-lg mb-2 text-gray-700">First Name:</label>
                        <input type="text" name="first_name" class="w-full border border-green-400 text-lg p-2 outline-none">

                        @error('first_name')
                        <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="w-full p-2">
                        <label for="last_name" class="text-lg mb-2 text-gray-700">Last Name:</label>
                        <input type="text" name="last_name" class="w-full border border-green-400 text-lg p-2 outline-none">

                        @error('last_name')
                        <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="w-full p-2">
                        <label for="email" class="text-lg mb-2 text-gray-700">Email:</label>
                        <input type="email" name="email" class="w-full border border-green-400 text-lg p-2 outline-none">

                        @error('email')
                        <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="w-full p-2">
                        <label for="message" class="text-lg mb-2 text-gray-700">Message:</label>
                        <textarea name="message" id="" cols="30" rows="5" placeholder=""
                            class="w-full border border-green-400 text-lg p-2 outline-none"></textarea>

                            @error('message')
                        <p class="text-lg text-red-600 my-2">{{ $message }}</p>
                    @enderror

                        <button class="p-2 text-gray-800 bg-green-400 text-lg my-2 hover:bg-gray-800 hover:text-white">Submit</button>
                    </div>
                </form>
        </div>
    </section>
@endsection
