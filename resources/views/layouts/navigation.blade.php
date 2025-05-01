<!-- Primary Navigation Menu -->
<nav x-data="{ open: false, scrolled: false }" 
     @scroll.window="scrolled = window.pageYOffset > 0"
     :class="{ 'bg-red-600': !scrolled, 'bg-red-700 shadow-lg': scrolled }"
     class="fixed w-full z-50 transition-all duration-300 ease-in-out">
    <!-- Desktop Navigation -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 group">
                        <lottie-player class="lottie-small" src="https://assets2.lottiefiles.com/packages/lf20_2cwDXD.json" background="transparent" speed="1" loop autoplay></lottie-player>
                        <span class="text-xl font-bold text-white transition-all duration-300 group-hover:text-red-600">TourismHub</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
                        class="nav-effect relative text-white hover:text-red-600 hover:bg-white px-3 py-2 rounded-md transition-all duration-300 group">
                        <span class="relative z-10">{{ __('Dashboard') }}</span>
                        <span class="absolute inset-0 bg-white rounded-md transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                    </x-nav-link>
                    <x-nav-link :href="route('hotels.index')" :active="request()->routeIs('hotels.*')" 
                        class="nav-effect relative text-white hover:text-red-600 hover:bg-white px-3 py-2 rounded-md transition-all duration-300 group">
                        <span class="relative z-10">{{ __('Hotels') }}</span>
                        <span class="absolute inset-0 bg-white rounded-md transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                    </x-nav-link>
                    <x-nav-link :href="route('packages.index')" :active="request()->routeIs('packages.*')" 
                        class="nav-effect relative text-white hover:text-red-600 hover:bg-white px-3 py-2 rounded-md transition-all duration-300 group">
                        <span class="relative z-10">{{ __('Packages') }}</span>
                        <span class="absolute inset-0 bg-white rounded-md transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                    </x-nav-link>
                    <x-nav-link :href="route('bookings.index')" :active="request()->routeIs('bookings.*')" 
                        class="nav-effect relative text-white hover:text-red-600 hover:bg-white px-3 py-2 rounded-md transition-all duration-300 group">
                        <span class="relative z-10">{{ __('My Bookings') }}</span>
                        <span class="absolute inset-0 bg-white rounded-md transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="modern-btn flex items-center space-x-2 text-sm font-medium text-white hover:text-red-600 hover:bg-white px-3 py-2 rounded-md focus:outline-none transition-all duration-300 ease-in-out group">
                                <div class="relative">
                                    <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-red-600 font-semibold text-sm transform transition-transform duration-300 group-hover:scale-110">
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    </div>
                                    @if(auth()->user()->is_admin)
                                        <div class="absolute -bottom-1 -right-1 w-3 h-3 bg-green-500 rounded-full border-2 border-white"></div>
                                    @endif
                                </div>
                                <div class="transform transition-transform duration-300 group-hover:scale-105">{{ Auth::user()->name }}</div>
                                <div class="ml-1 transform transition-transform duration-300 group-hover:rotate-180">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Profile -->
                            <x-dropdown-link :href="route('profile.edit')" 
                                class="text-gray-700 hover:bg-red-100 hover:text-gray-900 transition-all duration-300 transform hover:translate-x-1">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();"
                                        class="text-gray-700 hover:bg-red-100 hover:text-gray-900 transition-all duration-300 transform hover:translate-x-1">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <div class="space-x-4">
                        <a href="{{ route('login') }}" 
                           class="modern-btn text-sm text-white hover:text-red-600 hover:bg-white px-3 py-2 rounded-md transition-all duration-300 transform hover:scale-105">
                            <span class="flex items-center">
                                <lottie-player class="lottie-small mr-2" src="https://assets2.lottiefiles.com/packages/lf20_2cwDXD.json" background="transparent" speed="1" loop autoplay></lottie-player>
                                Log in
                            </span>
                        </a>
                        <a href="{{ route('register') }}" 
                           class="modern-btn text-sm text-white hover:text-red-600 hover:bg-white px-3 py-2 rounded-md transition-all duration-300 transform hover:scale-105">
                            <span class="flex items-center">
                                <lottie-player class="lottie-small mr-2" src="https://assets2.lottiefiles.com/packages/lf20_2cwDXD.json" background="transparent" speed="1" loop autoplay></lottie-player>
                                Register
                            </span>
                        </a>
                    </div>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" 
                        class="modern-btn inline-flex items-center justify-center p-2 rounded-md text-white hover:text-red-600 hover:bg-white focus:outline-none focus:bg-white focus:text-red-600 transition duration-300 ease-in-out transform hover:scale-110">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" 
         class="hidden sm:hidden transition-all duration-300 ease-in-out transform origin-top"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 transform -translate-y-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform -translate-y-2">
        <div class="pt-2 pb-3 space-y-1">
            @auth
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
                    class="text-white hover:text-red-600 hover:bg-white transition-all duration-300 transform hover:translate-x-2">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('hotels.index')" :active="request()->routeIs('hotels.*')" 
                    class="text-white hover:text-red-600 hover:bg-white transition-all duration-300 transform hover:translate-x-2">
                    {{ __('Hotels') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('packages.index')" :active="request()->routeIs('packages.*')" 
                    class="text-white hover:text-red-600 hover:bg-white transition-all duration-300 transform hover:translate-x-2">
                    {{ __('Packages') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('bookings.index')" :active="request()->routeIs('bookings.*')" 
                    class="text-white hover:text-red-600 hover:bg-white transition-all duration-300 transform hover:translate-x-2">
                    {{ __('My Bookings') }}
                </x-responsive-nav-link>
            @endauth
        </div>

        <!-- Responsive Settings Options -->
        @auth
            <div class="pt-4 pb-1 border-t border-red-500">
                <div class="px-4">
                    <div class="flex items-center space-x-3">
                        <div class="relative">
                            <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-red-600 font-semibold text-lg">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            @if(auth()->user()->is_admin)
                                <div class="absolute -bottom-1 -right-1 w-3 h-3 bg-green-500 rounded-full border-2 border-white"></div>
                            @endif
                        </div>
                        <div>
                            <div class="font-medium text-base text-white transform transition-transform duration-300 hover:translate-x-2">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-red-100">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Profile -->
                    <x-responsive-nav-link :href="route('profile.edit')" 
                        class="text-white hover:text-red-600 hover:bg-white transition-all duration-300 transform hover:translate-x-2">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();"
                                class="text-white hover:text-red-600 hover:bg-white transition-all duration-300 transform hover:translate-x-2">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @else
            <div class="pt-4 pb-1 border-t border-red-500">
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('login')" 
                        class="text-white hover:text-red-600 hover:bg-white transition-all duration-300 transform hover:translate-x-2">
                        {{ __('Log in') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('register')" 
                        class="text-white hover:text-red-600 hover:bg-white transition-all duration-300 transform hover:translate-x-2">
                        {{ __('Register') }}
                    </x-responsive-nav-link>
                </div>
            </div>
        @endauth
    </div>
</nav>
