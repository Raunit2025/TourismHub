<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Hotels</h1>
            @if(auth()->check() && auth()->user()->is_admin)
                <a href="{{ route('hotels.create') }}" class="btn-primary group">
                    <span class="flex items-center">
                        <lottie-player class="lottie-small mr-2" src="https://assets2.lottiefiles.com/packages/lf20_2cwDXD.json" background="transparent" speed="1" loop autoplay></lottie-player>
                        Add New Hotel
                    </span>
                </a>
            @endif
        </div>

        @if($hotels->isEmpty())
            <div class="flex flex-col items-center justify-center py-12">
                <lottie-player class="lottie-large" src="https://assets2.lottiefiles.com/packages/lf20_2cwDXD.json" background="transparent" speed="1" loop autoplay></lottie-player>
                <h2 class="text-2xl font-semibold text-gray-700 mt-4">No Hotels Available</h2>
                <p class="text-gray-500 mt-2">Start by adding your first hotel!</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($hotels as $hotel)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                        <div class="relative">
                            @if(is_array($hotel->images) && !empty($hotel->images))
                                <img src="{{ $hotel->images[0] }}" 
                                     alt="{{ $hotel->name }}" 
                                     class="w-full h-64 object-cover">
                            @else
                                <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                                     alt="Luxury Hotel Room"
                                     class="w-full h-64 object-cover">
                            @endif
                            <div class="absolute top-4 right-4 bg-red-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                {{ number_format($hotel->reviews->avg('rating'), 1) }} ★
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $hotel->name }}</h3>
                            <div class="flex items-center text-gray-600 mb-4">
                                <svg class="w-5 h-5 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span>{{ $hotel->location }}</span>
                            </div>
                            <p class="text-gray-600 mb-4 line-clamp-2">{{ $hotel->description }}</p>
                            
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                    </svg>
                                    <span>{{ $hotel->room_count }} Rooms</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>Check-in: {{ $hotel->check_in_time }}</span>
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="text-2xl font-bold text-red-600">
                                    ₹{{ number_format($hotel->price_per_night, 2) }} <span class="text-sm text-gray-500">/ night</span>
                                </div>
                                <div class="flex space-x-2">
                                    <a href="{{ route('hotels.show', $hotel) }}" 
                                       class="modern-btn bg-white text-red-600 border border-red-600 hover:bg-red-600 hover:text-white">
                                        View Details
                                    </a>
                                    <a href="{{ route('bookings.create', ['hotel_id' => $hotel->id]) }}" 
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
                {{ $hotels->links() }}
            </div>
        @endif
    </div>
</x-app-layout> 