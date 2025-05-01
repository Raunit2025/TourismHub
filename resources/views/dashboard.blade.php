<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <div class="flex space-x-4">
                <span class="text-sm text-gray-500">Welcome back, {{ Auth::user()->name }}!</span>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg transform transition-all duration-300 hover:shadow-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Hotels Card -->
                        <div class="card group">
                            <div class="relative h-48 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                                     alt="Luxury Hotel"
                                     class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                <div class="absolute bottom-0 left-0 p-4">
                                    <h3 class="text-lg font-semibold text-white">Hotels</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="text-gray-600 mb-4">Browse and book from our selection of premium hotels.</p>
                                <a href="{{ route('hotels.index') }}" 
                                   class="inline-flex items-center text-red-600 hover:text-red-700 transition-all duration-300 group">
                                    <span>View Hotels</span>
                                    <svg class="w-4 h-4 ml-1 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- Travel Packages Card -->
                        <div class="card group">
                            <div class="relative h-48 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2074&q=80" 
                                     alt="Travel Package"
                                     class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                <div class="absolute bottom-0 left-0 p-4">
                                    <h3 class="text-lg font-semibold text-white">Travel Packages</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="text-gray-600 mb-4">Explore our curated travel packages for unforgettable experiences.</p>
                                <a href="{{ route('packages.index') }}" 
                                   class="inline-flex items-center text-red-600 hover:text-red-700 transition-all duration-300 group">
                                    <span>View Packages</span>
                                    <svg class="w-4 h-4 ml-1 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- Bookings Card -->
                        <div class="card group">
                            <div class="relative h-48 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2073&q=80" 
                                     alt="Beach Booking"
                                     class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                <div class="absolute bottom-0 left-0 p-4">
                                    <h3 class="text-lg font-semibold text-white">My Bookings</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="text-gray-600 mb-4">Manage your current and upcoming bookings.</p>
                                <a href="{{ route('bookings.index') }}" 
                                   class="inline-flex items-center text-red-600 hover:text-red-700 transition-all duration-300 group">
                                    <span>View Bookings</span>
                                    <svg class="w-4 h-4 ml-1 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 