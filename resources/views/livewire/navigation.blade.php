<!-- resources/views/livewire/navigation.blade.php -->
<nav class="bg-white/95 backdrop-blur-sm shadow-lg sticky top-0 z-50 transition-all duration-300" 

    x-data="{ isScrolled: false, isMobileMenuOpen: @entangle('isMobileMenuOpen') }"
    @scroll.window="isScrolled = (window.pageYOffset > 20)"
    :class="{ 'py-6': !isScrolled, 'py-3': isScrolled }"
>
    @guest

        <!-- Container -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- <div class="w-full">
                <div class="h-auto w-[165px]">
                    <img 
                        src="{{ asset('storage/images/KeNHA-Logo.webp') }}" 
                        alt="Toyota Hilux"
                        class="w-full h-full object-cover object-center transform transition-all duration-700 group-hover:scale-110"
                        loading="eager"
                    >
                </div>
            </div> --}}
            <div class="flex justify-between items-center">
                <!-- Logo/Brand -->
                <div class="flex-shrink-0">
                    <a href="/" class="flex items-center gap-2">
                        <span class="font-bold text-xl bg-gradient-to-r from-black via-gray-700 to-yellow-600 bg-clip-text text-transparent group-hover:text-yellow-600 transition-colors duration-300">
                            KeNHA-Cavalcade
                        </span>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden sm:flex sm:items-center sm:gap-6">
                    <a href="{{ route('home') }}"
                        wire:navigate
                        class="group relative px-4 py-2 rounded-md text-gray-700 hover:text-black transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2"
                    >
                        Home
                        <span class="absolute -bottom-px left-1/2 w-0 h-0.5 bg-yellow-400 transition-all group-hover:w-full group-hover:left-0"></span>
                    </a>
                    <a href="{{ route('contact') }}"
                        wire:navigate
                        class="group relative px-4 py-2 rounded-md text-gray-700 hover:text-black transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2"
                    >
                        Contact
                        <span class="absolute -bottom-px left-1/2 w-0 h-0.5 bg-yellow-400 transition-all group-hover:w-full group-hover:left-0"></span>
                    </a>
                    <a href="{{ route('login') }}"
                        wire:navigate
                        class="group relative px-4 py-2 rounded-md bg-yellow-400 text-black font-medium hover:bg-yellow-500 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2"
                        role="button"
                    >
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                        wire:navigate
                        class="group px-4 py-2 rounded-md border-2 border-yellow-400 text-black font-medium hover:bg-yellow-400/10 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2"
                        role="button"
                    >
                        Register
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="flex items-center sm:hidden">
                    <button 
                        @click.prevent="isMobileMenuOpen = !isMobileMenuOpen"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-yellow-500"
                        aria-controls="mobile-menu"
                        :aria-expanded="isMobileMenuOpen.toString()">
                        <span class="sr-only">Open main menu</span>
                        <!-- Menu Icon -->
                        <svg class="h-6 w-6 transition-transform duration-200" 
                            :class="{'hidden': isMobileMenuOpen, 'block': !isMobileMenuOpen }" 
                            stroke="currentColor" 
                            fill="none" 
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <!-- Close Icon -->
                        <svg class="h-6 w-6 transition-transform duration-200" 
                            :class="{'block': isMobileMenuOpen, 'hidden': !isMobileMenuOpen }" 
                            stroke="currentColor" 
                            fill="none" 
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

            </div>
        </div>

        <!-- Mobile Navigation -->
        <div class="sm:hidden" 
            x-show="isMobileMenuOpen" 
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-1"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-1"
            @click.away="isMobileMenuOpen = false">
            <div class="pt-2 pb-3 space-y-1">
                <a href="{{ route('home') }}"
                    wire:navigate
                    class="block px-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-100 hover:text-black transition-all duration-300"
                >
                    Home
                </a>
                <a href="{{ route('contact') }}"
                    wire:navigate
                class="block px-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-100 hover:text-black transition-all duration-300"
                >
                    Contact
                </a>
                <a href="{{ route('login') }}"
                    wire:navigate
                    class="block px-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-100 hover:text-black transition-all duration-300"
                >
                    Login
                </a>
                <a href="{{ route('register') }}"
                    wire:navigate
                    class="block px-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-100 hover:text-black transition-all duration-300"
                >
                    Register
                </a>
            </div>
        </div>

    @endguest


    @auth
        @if(auth()->user()->hasRole('Super Admin'))
            <h1 class="text-2xl font-bold mb-4">Super Admin Navigation</h1>
        @elseif(auth()->user()->hasRole('Admin'))
            <h1 class="text-2xl font-bold mb-4">Admin Navigation</h1>
        @elseif(auth()->user()->hasRole('Driver'))
            <h1 class="text-2xl font-bold mb-4">Driver Navigation</h1>
        @elseif(auth()->user()->hasRole('User'))
            <h1 class="text-2xl font-bold mb-4">User Navigation</h1>
        @endif
    @endauth

</nav>