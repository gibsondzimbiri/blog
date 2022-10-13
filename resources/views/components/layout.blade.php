<!doctype html>
<head>
    <title>Rees: Understanding Programming</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js'])-->

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
@vite('resources/css/app.css')

<body style="font-family: Open Sans, sans-serif">
<section class="px-0 py-8 pt-0 border border-gray-600">
    <nav class="md:flex md:justify-between md:items-center bg-gradient-to-b from-blue-800 to-blue-300 pt-5 pb-5 px-4">
        <div class="font-bold text-lg text-white">
            <a href="/">
                Rees Blog
            </a>
        </div>
        <div>
            <h1 class="text-xl text-white">
                Understanding programming
            </h1>
        </div>
        <div class="mt-8 md:mt-0 flex items-center z-index: 1 ">

            @auth
                <x-dropdown>
                    <x-slot name="trigger">
                        <button class="text-xs font-bold">Welcome back, {{ auth()->user()->name }}</button>
                    </x-slot>
                    @admin
                    <x-dropdown-item href="/admin/posts">Dashboard</x-dropdown-item>
                    @endadmin

                    <x-dropdown-item href="/admin/posts/create">Create a new post</x-dropdown-item>

                    <x-dropdown-item href="/users/password/{{ auth()->user()->id}}/edit">Change password
                    </x-dropdown-item>

                    <x-dropdown-item href="/logout">Logout</x-dropdown-item>
                    <!-- <x-dropdown-item href="#" x-data="{}" @click.preent="document.querySelector('#logout-form').submit()">Logout</x-dropdown-item> -->
                </x-dropdown>

                <form id="logout-form" method="POST" action="/logout" class="text-sm text-blue-500 font-semibold ml-6"
                      class="hidden">
                    @csrf

                </form>
            @else
                <a href="/register" class="text-xs font-bold text-white">Register</a>
                <a href="/login" class="text-xs font-bold ml-4 text-white">Login</a>
            @endauth
            <a href="#mailchip-subscribe"
               class="bg-blue-500 ml-3 rounded-3xl text-xs font-semibold text-white py-3 px-5">
                Subscribe for Updates
            </a>
        </div>

    </nav>

    <nav class="flex md:justify-between md:items-center mt-0 px-5 border border-b-black sticky top-0 z-0 bg-white">
        <div class="pl-20 flex">
            <button data-collapse-toggle="navbar-default" type="button"
                    class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="flex flex-col p-4 mt-4 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li><a href="/" class="text-xs font-bold">Home</a></li>
                    <li><a href="/about" class="text-xs font-bold">About</a></li>
                </ul>
            </div>

        </div>
        <div class="float-right">
            @include('posts._header')
        </div>
    </nav>

    @if(session()->has('success'))
        <div x-data="{ show: true }"
             x-init="setTimeout(() => show=false, 5000);"
             x-show="show"
             class="bg-blue-500 text-white py-2 rounded pl-4 pr-4 w-6/12 mx-auto mt-20 z-50"
        >
            {{ session('success') }}
        </div>
    @endif

    {{ $slot }}

    <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16 sticky">
        <h5 class="text-xl">Stay in touch with the latest news</h5>
        <div class="relative inline-block mx-auto lg:bg-white-500 rounded-full border border-gray-600">
            <form method="POST" action="/newsletter" class="lg:flex text-sm bg-white rounded-full"
                  id="mailchip-subscribe">
                @csrf
                <div class="lg:px-5 flex items-center bg-white-500">
                    <label for="email" class="hidden lg:inline-block">
                        <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                    </label>
                    <div class="flex">
                        <input id="email" type="text"
                               name="email"
                               placeholder="Enter email address"
                               class="rounded-full py-2 text-center outline-1 outline-gray-300">
                    </div>
                </div>
                <button type="submit"
                        class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 lg:mt-0 lg:ml-3 rounded-3xl text-xs font-semibold text-white uppercase py-3 px-3"
                >
                    Subscribe
                </button>
            </form>
        </div>
        @error('email')
        <p class="text-red-500 text-xs">{{ $message }}</p>
        @enderror
    </footer>
</section>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
</body>
