<div class="dark-mode:text-gray-200 dark-mode:bg-gray-800 fixed z-20 w-full bg-white text-gray-700">
    <div x-data="{ open: true, profileMenu: false }"
        class="mx-auto flex max-w-screen-xl flex-col px-4 md:flex-row md:items-center md:justify-between md:px-6 lg:px-8">
        <div class="flex flex-row items-center justify-between p-4">
            <a href="#"
                class="dark-mode:text-white focus:shadow-outline rounded-lg text-lg font-semibold uppercase tracking-widest text-gray-900 focus:outline-none">
                <img src="{{ asset('images/AlurKerja.png') }}" alt="Logo" />
            </a>
            <button class="focus:shadow-outline rounded-lg focus:outline-none md:hidden" @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6">
                    <path x-show="open" fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                    <path x-show="!open" fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <style>
            a {
                color: rgb(0, 119, 255);
            }
        </style>
        <nav aria-label="" :class="{ 'flex': !open, 'hidden': open }"
            class="hidden flex-grow flex-col pb-4 md:flex md:flex-row md:justify-end md:pb-0">
            <a class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 rounded-lg bg-transparent px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 hover:no-underline focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0 md:ml-4"
                href="#">Beranda</a>
            <a class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 rounded-lg bg-transparent px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 hover:no-underline focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0 md:ml-4"
                href="#about">Tentang</a>
            <a class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 rounded-lg bg-transparent px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 hover:no-underline focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0 md:ml-4"
                href="#feature">Fitur</a>
            <a class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 rounded-lg bg-transparent px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 hover:no-underline focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0 md:ml-4"
                href="#demo">Demo</a>
            <a class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 rounded-lg bg-transparent px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 hover:no-underline focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0 md:ml-4"
                href="#contact">Kontak</a>
            @if (auth()->check())
                <!-- User is authenticated, show profile icon -->
                <div @mouseenter="profileMenu = true" @mouseleave="profileMenu = false"
                    class="relative mt-2 md:mt-0 md:ml-4">
                    <button @click="profileMenu = !profileMenu" class="focus:outline-none">
                        <img src="{{ auth()->user()->profile_picture }}" alt="Profile"
                            class="h-8 w-8 rounded-full object-cover">
                    </button>
                    <div x-show="profileMenu" @click.away="profileMenu = false"
                        class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 py-1">
                        <a href="{{ route('profile') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                        <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            @else
                <!-- User is not authenticated, show login and register links -->
                <a class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 rounded-lg bg-transparent px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 hover:no-underline focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0 md:ml-4"
                    href="{{ route('login') }}">Sign In</a>
                <a class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 rounded-lg bg-transparent px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 hover:no-underline focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0 md:ml-4"
                    href="{{ route('register') }}">Sign Up</a>
            @endif


        </nav>
    </div>
</div>
