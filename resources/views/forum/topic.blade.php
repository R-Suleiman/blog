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

               <div class="w-full">
                   <div class="w-full flex my-2">
                       <div class="w-32 md:w-24 rounded-full border border-green-400 mr-2 h-fit">
                           <a href="#"><img src="{{ asset('img/user.avif') }}" alt="author photo"
                                   class="object-center w-full rounded-full"></a>
                       </div>
                       <div class="flex flex-col">
                           <div class="w-full flex flex-col">
                               <span class="mr-2 text-gray-800 font-semibold">Jane Doe</span>
                               <span class="text-sm text-gray-600">13:00 - 12/12/2023</span>
                           </div>
                           <p class="my-2 text-gray-700 text-justify">Lorem ipsum dolor sit amet consectetur
                               adipisicing elit. Labore laboriosam reprehenderit saepe asperiores deleniti, maxime id.
                               Quas nostrum velit expedita enim optio non, ullam eius, repellat, asperiores dolor
                               consequatur fuga!</p>
                           <div class="text-gray-700 mb-3">
                               <span>Reply</span>
                               <span class="mx-2"><i class="far fa-heart"></i> 12</span>
                           </div>
                       </div>
                   </div>
                   <div class="w-full flex my-2">
                       <div class="w-32 md:w-24 rounded-full border border-green-400 mr-2 h-fit">
                           <a href="#"><img src="{{ asset('img/user.avif') }}" alt="author photo"
                                   class="object-center w-full rounded-full"></a>
                       </div>
                       <div class="flex flex-col">
                           <div class="w-full flex flex-col">
                               <span class="mr-2 text-gray-800 font-semibold">Jane Doe</span>
                               <span class="text-sm text-gray-600">13:00 - 12/12/2023</span>
                           </div>
                           <p class="my-2 text-gray-700 text-justify">Lorem ipsum dolor sit amet consectetur
                               adipisicing elit. Labore laboriosam reprehenderit saepe asperiores deleniti, maxime id.
                               Quas nostrum velit expedita enim optio non, ullam eius, repellat, asperiores dolor
                               consequatur fuga!</p>
                           <div class="text-gray-700 mb-3">
                            <span>Reply</span>
                            <span class="mx-2"><i class="far fa-heart"></i> 12</span>
                           </div>
                       </div>
                   </div>
               </div>

               <div class="w-full mt-8">
                   <form action="#">
                       <div class="w-full p-2">
                           <textarea name="" id="" cols="30" rows="5" placeholder="Add a comment"
                               class="w-full border border-green-400 text-lg p-2 outline-none"></textarea>
                           <button class="p-2 text-gray-800 bg-green-400 text-lg my-2">Comment</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>

    </section>

@endsection
