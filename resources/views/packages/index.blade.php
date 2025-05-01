<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Travel Packages</h1>
            @if(auth()->check() && auth()->user()->is_admin)
                <a href="{{ route('packages.create') }}" class="btn-primary group">
                    <span class="flex items-center">
                        <lottie-player class="lottie-small mr-2" src="https://assets2.lottiefiles.com/packages/lf20_2cwDXD.json" background="transparent" speed="1" loop autoplay></lottie-player>
                        Add New Package
                    </span>
                </a>
            @endif
        </div>

        @if($packages->isEmpty())
            <div class="flex flex-col items-center justify-center py-12">
                <lottie-player class="lottie-large" src="https://assets2.lottiefiles.com/packages/lf20_2cwDXD.json" background="transparent" speed="1" loop autoplay></lottie-player>
                <h2 class="text-2xl font-semibold text-gray-700 mt-4">No Packages Available</h2>
                <p class="text-gray-500 mt-2">Start by adding your first travel package!</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($packages as $package)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                        <div class="relative">
                            @if(is_array($package->images) && !empty($package->images))
                                <img src="{{ $package->images[0] }}" 
                                     alt="{{ $package->name }}" 
                                     class="w-full h-64 object-cover">
                            @else
                                <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2074&q=80" 
                                     alt="Beautiful Travel Destination"
                                     class="w-full h-64 object-cover">
                            @endif
                            <div class="absolute top-4 right-4 bg-red-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                {{ number_format($package->reviews->avg('rating'), 1) }} ★
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $package->name }}</h3>
                            <div class="flex items-center text-gray-600 mb-4">
                                <svg class="w-5 h-5 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span>{{ $package->destination }}</span>
                            </div>
                            <p class="text-gray-600 mb-4 line-clamp-2">{{ $package->description }}</p>
                            
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span>{{ $package->duration }} days</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                    <span>Max: {{ $package->max_participants }} people</span>
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="text-2xl font-bold text-red-600">
                                    ₹{{ number_format($package->price, 2) }} <span class="text-sm text-gray-500">/ person</span>
                                </div>
                                <div class="flex space-x-2">
                                    <a href="{{ route('packages.show', $package) }}" 
                                       class="modern-btn bg-white text-red-600 border border-red-600 hover:bg-red-600 hover:text-white">
                                        View Details
                                    </a>
                                    <a href="{{ route('bookings.create', ['package_id' => $package->id]) }}" 
                                       class="modern-btn bg-red-600 text-white hover:bg-red-700">
                                        Book Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $packages->links() }}
            </div>
        @endif
    </div>
</x-app-layout> 