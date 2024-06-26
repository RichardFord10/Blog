@if(Auth::check())
<nav x-data="{ open: false }" class="nav-container bg-gray-800 border-b border-gray-100 border-gray-800">
    <!-- Primary Navigation Menu -->
    <div class="max-w-9xl mx-auto px-3 sm:px-6 lg:px-8">
        <div class="flex justify-between h-14 items-center">
            <div class="flex justify-start">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        @if(Auth::user()->image)
                        <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="Profile Image" class="h-9 w-auto rounded-full">
                        @else
                        <i class="fa fa-home text-white"></i>
                        @endif
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard.index')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <!-- Link -->
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="mr-2 relative" x-data="{ open: false }">
                    <button @click="open = !open" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition">
                        Menu
                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" @click.away="open = false" x-cloak class="absolute z-50 mt-2 w-48 rounded-md shadow-lg bg-gray-800 ring-1 ring-black ring-opacity-5">
                        <div class="py-1">

                            <a href="{{ route('posts.index') }}" class="block px-4 py-2 text-sm text-gray-800 text-gray-200 hover:bg-gray-100 hover:bg-gray-800">
                                Blog Posts
                            </a>
                            <!-- <a href="{{ route('chat.index') }}"
                                class="block px-4 py-2 text-sm text-gray-800 text-gray-200 hover:bg-gray-100 hover:bg-gray-800">
                                ChatGPT Clone
                            </a>
                            <a href="{{ route('products.index') }}"
                                class="block px-4 py-2 text-sm text-gray-800 text-gray-200 hover:bg-gray-100 hover:bg-gray-800">
                                Product Filter
                            </a>
                            <a href="{{ route('imdb') }}"
                                class="block px-4 py-2 text-sm text-gray-800 text-gray-200 hover:bg-gray-100 hover:bg-gray-800">
                                Data Table
                            </a>
                            <a href="{{ route('finance-tracker') }}"
                                class="block px-4 py-2 text-sm text-gray-800 text-gray-200 hover:bg-gray-100 hover:bg-gray-800">
                                Finance Tracker
                            </a>
                            <a href="{{ route('upload') }}"
                                class="block px-4 py-2 text-sm text-gray-800 text-gray-200 hover:bg-gray-100 hover:bg-gray-800">
                                CSV Tool
                            </a> -->
                            <!-- Additional feature links can be added here -->
                        </div>
                    </div>
                </div>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 text-gray-400 bg-gray-800 hover:text-gray-700 hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <!-- TODO add logo -->
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 text-gray-500 hover:text-gray-500 hover:text-gray-400 hover:bg-gray-100 hover:bg-gray-900 focus:outline-none focus:bg-gray-100 focus:bg-gray-900 focus:text-gray-500 focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard.index')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <!-- <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Portfolio') }}
            </x-responsive-nav-link> -->

            <x-responsive-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                {{ __('Blog Posts') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('chat.index')" :active="request()->routeIs('chat.index')">
                {{ __('ChatGPT Clone') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('imdb')" :active="request()->routeIs('imdb')">
                {{ __('Data Table') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('finance-tracker')" :active="request()->routeIs('finance-tracker')">
                {{ __('Finance Tracker') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('upload')" :active="request()->routeIs('upload')">
                {{ __('CSV Tool') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('products.index')" :active="request()->routeIs('products.index')">
                {{ __('Product Filter') }}
            </x-responsive-nav-link>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200 border-gray-600">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
@else
<!-- User is not logged in -->
<nav x-data="{ open: false }" class="nav-container bg-gray-800 border-b border-gray-100 border-gray-800">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-14 items-center">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <i class="fa fa-home text-white"></i>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard.index')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
                <div class="sm:flex sm:items-center sm:ml-6">
                    <a href="mailto:richardford10@gmail.com" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-500 hover:bg-green-700 focus:outline-none transition ml-2">
                        Contact
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="flex sm:items-center sm:ms-6">

                <x-responsive-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')" class="text-white">
                    {{ __('Blog') }}
                </x-responsive-nav-link>

                <!-- <x-responsive-nav-link :href="route('chat.index')" :active="request()->routeIs('chat.index')">
                    {{ __('ChatGPT Clone') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('imdb')" :active="request()->routeIs('imdb')">
                    {{ __('Data Table') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('finance-tracker')" :active="request()->routeIs('finance-tracker')">
                    {{ __('Finance Tracker') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('upload')" :active="request()->routeIs('upload')">
                    {{ __('CSV Tool') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('products.index')" :active="request()->routeIs('products.index')">
                    {{ __('Product Filter') }}
                </x-responsive-nav-link> -->

                <x-responsive-nav-link :href=" route('login')" :active="request()->routeIs('login')" class="text-white">
                    {{ __('Login') }}
                </x-responsive-nav-link>
                <!-- @if (Route::has('register'))
                <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                    {{ __('Register') }}
                </x-responsive-nav-link>
                @endif -->
            </div>

            <!-- Remove Hamburger Menu -->
            <!-- Previously here was a div containing the hamburger menu button -->

        </div>
    </div>
    <!-- Responsive Navigation Menu -->
    <!-- Removing responsive hidden menu to make sure navigation bar is simplified -->
</nav>

@endif