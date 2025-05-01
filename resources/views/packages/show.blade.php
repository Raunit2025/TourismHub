<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Package Header -->
                    <div class="flex flex-col md:flex-row gap-6 mb-8">
                        <!-- Package Image -->
                        <div class="w-full md:w-1/2">
                            @if(is_array($package->images) && !empty($package->images))
                                <img src="{{ $package->images[0] }}" alt="{{ $package->name }}" class="w-full h-96 object-cover rounded-lg shadow-lg">
                            @else
                                <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2074&q=80" 
                                     alt="Beautiful Travel Destination"
                                     class="w-full h-96 object-cover rounded-lg shadow-lg">
                            @endif
                        </div>
                        
                        <!-- Package Info -->
                        <div class="w-full md:w-1/2">
                            <h1 class="text-3xl font-bold text-red-600 mb-4">{{ $package->name }}</h1>
                            <div class="flex items-center mb-4">
                                <div class="flex text-yellow-400">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg class="w-5 h-5 {{ $i <= $package->rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    @endfor
                                </div>
                                <span class="ml-2 text-gray-600">({{ $package->rating }})</span>
                            </div>
                            <p class="text-gray-600 mb-4">{{ $package->description }}</p>
                            <div class="grid grid-cols-2 gap-4 mb-6">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span class="text-gray-600">{{ $package->destination }}</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span class="text-gray-600">{{ $package->duration }} days</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span class="text-gray-600">Start Time: {{ $package->start_time }}</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                    <span class="text-gray-600">Max: {{ $package->max_participants }} people</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="text-2xl font-bold text-red-600">
                                    ₹{{ number_format($package->price, 2) }} <span class="text-sm text-gray-500">/ person</span>
                                </div>
                                <a href="{{ route('bookings.create', ['package_id' => $package->id]) }}" 
                                   class="modern-btn bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition duration-300">
                                    Book Now
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Itinerary -->
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">Itinerary</h2>
                        <div class="space-y-4">
                            @php
                                $itinerary = is_array($package->itinerary) ? $package->itinerary : json_decode($package->itinerary, true) ?? [];
                            @endphp
                            @if(is_array($itinerary) && !empty($itinerary))
                                @foreach($itinerary as $day => $activities)
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <h3 class="text-lg font-semibold text-red-600 mb-2">Day {{ $day }}</h3>
                                        <ul class="list-disc list-inside text-gray-600">
                                            @if(is_array($activities))
                                                @foreach($activities as $activity)
                                                    <li>{{ $activity }}</li>
                                                @endforeach
                                            @else
                                                <li>{{ $activities }}</li>
                                            @endif
                                        </ul>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-gray-600">No itinerary available.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Inclusions -->
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">What's Included</h2>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            @php
                                $inclusions = is_array($package->inclusions) ? $package->inclusions : json_decode($package->inclusions, true) ?? [];
                            @endphp
                            @if(is_array($inclusions) && !empty($inclusions))
                                @foreach($inclusions as $inclusion)
                                    <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                                        <svg class="w-5 h-5 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span class="text-gray-600">{{ $inclusion }}</span>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-gray-600">No inclusions available.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Reviews -->
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">Reviews</h2>
                        @if($package->reviews && $package->reviews->count() > 0)
                            <div class="space-y-4">
                                @foreach($package->reviews as $review)
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
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">Destination</h2>
                        <div class="h-96 bg-gray-200 rounded-lg">
                            <iframe 
                                width="100%" 
                                height="100%" 
                                frameborder="0" 
                                scrolling="no" 
                                marginheight="0" 
                                marginwidth="0" 
                                src="https://maps.google.com/maps?q={{ urlencode($package->destination) }}&output=embed">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 