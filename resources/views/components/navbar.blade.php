<nav class="w-full p-2 bg-gray-800 sticky top-0 z-50">
    {{-- <div class="w-full flex items-center"> --}}
    <div class="w-11/12 mx-auto p-2 flex flex-col lg:flex-row lg:items-center">
        <div class="w-full lg:w-2/12 flex items-center justify-between">
            <h1 class="text-green-400 text-2xl"><a href="{{ route('index') }}">Blog</a></h1>
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
                    <x-nav-link href="{{ route('index') }}" :active="request()->is('/')">
                        Home
                    </x-nav-link>
                    <x-nav-link href="{{ route('latest') }}" :active="request()->is('latest')">
                        Latest
                    </x-nav-link>
                    @foreach ($categories->take(5) as $category)
                        <x-nav-link href="{{ route('category-posts', $category->category) }}" :active="request()->is('posts/category')">
                            {{ $category->category }}
                        </x-nav-link>
                    @endforeach
                    <x-nav-link href="#">
                        Forum
                    </x-nav-link>
                    <x-nav-link href="{{ route('contact') }}" :active="request()->is('contact-us')">
                        Contact Us
                    </x-nav-link>
                </ul>
            </div>

            <div class="w-max lg:p-2 lg:ml-auto flex flex-col lg:flex-row items-center">

                @if (Auth::guard('admin')->check() || Auth::guard('web')->check())
                    <a href="{{ Auth::guard('admin')->check() ? route('admin.dashboard') : route('user.index') }}"><button
                            class="ml-4 text-green-400 text-lg"><i class="fa fa-user "></i></button></a>
                @else
                    <a href="{{ route('login') }}"><button
                            class="w-max bg-green-400 py-1 px-4 rounded-xl text-gray-800 text-lg font-semibold hover:text-white hover:bg-green-700">Sign
                            In</button></a>
                @endif

                @auth

                @endauth
                <a href="{{ route('search-page') }}"><button class="ml-4 text-green-400 text-lg"><i
                            class="fa fa-search"></i></button></a>
            </div>
        </div>
    </div>
    {{-- </div> --}}
</nav>
