<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Hotel Header -->
                    <div class="flex flex-col md:flex-row gap-6 mb-8">
                        <!-- Hotel Image -->
                        <div class="w-full md:w-1/2">
                            @if(is_array($hotel->images) && !empty($hotel->images))
                                <img src="{{ $hotel->images[0] }}" alt="{{ $hotel->name }}" class="w-full h-96 object-cover rounded-lg shadow-lg">
                            @else
                                <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945" alt="Default Hotel Image" class="w-full h-96 object-cover rounded-lg shadow-lg">
                            @endif
                        </div>
                        
                        <!-- Hotel Info -->
                        <div class="w-full md:w-1/2">
                            <h1 class="text-3xl font-bold text-red-600 mb-4">{{ $hotel->name }}</h1>
                            <div class="flex items-center mb-4">
                                <div class="flex text-yellow-400">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg class="w-5 h-5 {{ $i <= $hotel->rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    @endfor
                                </div>
                                <span class="ml-2 text-gray-600">({{ $hotel->rating }})</span>
                            </div>
                            <p class="text-gray-600 mb-4">{{ $hotel->description }}</p>
                            <div class="grid grid-cols-2 gap-4 mb-6">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span class="text-gray-600">{{ $hotel->location }}</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span class="text-gray-600">Check-in: {{ $hotel->check_in_time }}</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                    </svg>
                                    <span class="text-gray-600">{{ $hotel->room_count }} Rooms</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span class="text-gray-600">Check-out: {{ $hotel->check_out_time }}</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="text-2xl font-bold text-red-600">
                                    ₹{{ number_format($hotel->price_per_night, 2) }} <span class="text-sm text-gray-500">/ night</span>
                                </div>
                                <a href="{{ route('bookings.create.hotel', $hotel) }}" 
                                   class="modern-btn bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition duration-300">
                                    Book Now
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Amenities -->
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">Amenities</h2>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            @php
                                $amenities = is_array($hotel->amenities) ? $hotel->amenities : json_decode($hotel->amenities, true) ?? [];
                            @endphp
                            @foreach($amenities as $amenity)
                                <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                                    <svg class="w-5 h-5 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span class="text-gray-600">{{ $amenity }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Reviews -->
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">Reviews</h2>
                        @if($hotel->reviews && $hotel->reviews->count() > 0)
                            <div class="space-y-4">
                                @foreach($hotel->reviews as $review)
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <div class="flex items-center mb-2">
                                            <div class="flex text-yellow-400">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <svg class="w-4 h-4 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                    </svg>
                                                @endfor
                                            </div>
                                            <span class="ml-2 text-sm text-gray-500">{{ $review->created_at->format('M d, Y') }}</span>
                                        </div>
                                        <p class="text-gray-600">{{ $review->comment }}</p>
                                        <p class="text-sm text-gray-500 mt-2">By {{ $review->user->name }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-600">No reviews yet.</p>
                        @endif
                    </div>

                    <!-- Location Map -->
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">Location</h2>
                        <div class="h-96 bg-gray-200 rounded-lg">
                            <!-- Add your map integration here -->
                            <iframe 
                                width="100%" 
                                height="100%" 
                                frameborder="0" 
                                scrolling="no" 
                                marginheight="0" 
                                marginwidth="0" 
                                src="https://maps.google.com/maps?q={{ urlencode($hotel->location) }}&output=embed">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 