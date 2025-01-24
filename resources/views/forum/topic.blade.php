@extends('layouts.app')
@section('title', 'Forum Topics')
@section('content')

    <section class="w-11/12 mx-auto my-4">
        <div class="w-full bg-green-50 p-4 my-2">
            <div class="flex items-center">
                <img src="{{ asset('img/user.avif') }}" alt="" class="w-1/12 rounded-full mr-2">
                <div class="flex flex-col">
                    <a href="#"><span class="text-xl font-semibold hover:text-green-600">Jane
                            Doe</span></a>
                    <span class="text-gray-700 italic">Chief Journalist</span>
                </div>
            </div>

            <div class="w-full my-4">
                <div class="flex items-center mb-2">
                    <i class="far fa-clock"></i>
                    <span class="mx-1"> 1 minute ago</span>
                </div>
                <span class="text-green-700 text-lg">Machine Learning</span>
                <h2 class="mb-4 text-2xl font-semibold">Lets talk a bit more
                    about a global increase of tech robots and their effects on the people's safety.</h2>

                <div class="my-4">
                    <p class="text-lg text-gray-600 text-justify">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur iusto labore amet doloribus? Nemo
                        illo sed commodi amet reiciendis distinctio eos ab blanditiis, vitae voluptatum exercitationem
                        laudantium! Facilis, consequuntur fugit.
                        Obcaecati quia nobis exercitationem, minima iste accusantium repellat molestiae impedit animi quos
                        facilis quidem commodi laboriosam? Ad maxime, esse architecto ab possimus debitis. Fuga eaque quam
                        quos quae nostrum numquam.
                        Et dolor, culpa temporibus sunt provident odio veniam ratione obcaecati saepe hic vel, possimus ea
                        dicta quaerat laborum, maxime velit earum doloremque doloribus quam voluptates quas autem! Incidunt,
                        delectus ex!
                        Vitae amet rerum rem laboriosam beatae dolorem nam deserunt, iusto, aliquam ullam est atque quaerat
                        cum? Vero quas ut ullam accusantium reiciendis consequuntur, deserunt natus numquam neque delectus
                        iusto asperiores.
                        A placeat et similique, exercitationem quos nihil temporibus odio dolore alias vel minus, impedit
                        veniam explicabo? Tempore tempora, quaerat deserunt minus omnis, natus animi error perferendis
                        reprehenderit suscipit aut debitis.
                    </p>
                </div>

                <div class="w-full flex items-center text-gray-700 px-2 mt-3">
                    <span><i class="far fa-heart"></i> {{ 0 }}</span>
                    <span class="mx-3"><i class="far fa-comment"></i>
                        5</span>
                    <span><i class="far fa-eye"></i>
                        5</span>
                </div>
            </div>

        </div>
        {{-- comments --}}
        <div class="w-full">
            <div class="w-full border border-green-400 p-4">
                <h3 class="font-semibold text-2xl mb-4">Conversations</h3>

                <div class="w-full" id="comments-section">
                    @foreach ($comments as $comment)
                    <x-comment :comment="$comment" />
                    @endforeach
                </div>

                <div class="w-full mt-8">
                    <form id="comment-form">
                        <div class="w-full p-2">
                            <span id="reply-indicator" class="my-1 text-green-600 font-semibold"></span>
                            <input type="hidden" name="topic_id" value="1">
                            <textarea name="comment" id="comment-input" cols="30" rows="5" placeholder="Add a comment"
                                class="w-full border border-green-400 text-lg p-2 outline-none"></textarea>
                            <button class="p-2 text-gray-800 bg-green-400 hover:bg-green-700 hover:text-white text-lg my-2" type="submit">Comment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- @livewire('comment-component', ['topic_id' => 1]) --}}

    </section>

    <script src="../../js/forum.js" type="module"></script>
@endsection
