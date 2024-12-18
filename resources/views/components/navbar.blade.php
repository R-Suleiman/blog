<nav class="w-full p-2 bg-gray-800">
    {{-- <div class="w-full flex items-center"> --}}
    <div class="w-11/12 mx-auto p-2 flex flex-col lg:flex-row lg:items-center">
        <div class="w-full lg:w-2/12 flex items-center justify-between">
            <h1 class="text-green-400 text-2xl"><a href="#">Blog</a></h1>
            <div class="open-nav text-green-400 text-xl w-6 cursor-pointer block lg:hidden ml-auto">
                <i class="fa fa-align-justify"></i>
            </div>
            <div class="close-nav text-green-400 text-2xl w-6 cursor-pointer hidden">
                <i class="fa fa-times"></i>
            </div>
        </div>

        <div class="nav hidden lg:flex w-full lg:w-10/12 lg:items-center flex-col lg:flex-row">
            <div class="w-full">
                <ul class="w-full flex lg:items-center flex-col lg:flex-row">
                    <a href="{{ route('index') }}" class="text-white hover:text-green-400">
                        <li class="w-fit py-1 lg:px-4 text-lg">Home</li>
                    </a>
                    <a href="{{ route('latest') }}" class="text-white hover:text-green-400">
                        <li class="w-fit py-1 lg:px-4 text-lg">Latest</li>
                    </a>
                    <a href="{{ route('contact') }}" class="text-white hover:text-green-400">
                        <li class="w-fit py-1 lg:px-4 text-lg">Contact Us</li>
                    </a>
                </ul>
            </div>

            <div class="w-max lg:p-2 lg:ml-auto">
                <a href="#"><button
                        class="w-max bg-green-400 py-1 px-4 rounded-xl text-gray-800 text-lg font-semibold hover:text-white hover:bg-green-700">Sign
                        In</button></a>
            </div>
        </div>
    </div>
    {{-- </div> --}}
</nav>
