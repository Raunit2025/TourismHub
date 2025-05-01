<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Bookings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 animate-fade-in" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 animate-fade-in" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            @if($bookings->isEmpty())
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg animate-fade-in">
                    <div class="p-6 text-center">
                        <div class="max-w-md mx-auto">
                            <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_2cwDXD.json" 
                                         background="transparent" 
                                         speed="1" 
                                         style="width: 200px; height: 200px; margin: 0 auto;"
                                         loop autoplay>
                            </lottie-player>
                            <h3 class="text-xl font-semibold text-gray-800 mt-4 mb-2">No Bookings Yet</h3>
                            <p class="text-gray-600 mb-6">You haven't made any bookings yet. Start exploring our amazing hotels and tour packages!</p>
                            <div class="flex justify-center space-x-4">
                                <a href="{{ route('hotels.index') }}" 
                                   class="inline-flex items-center px-6 py-3 bg-red-600 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150 transform hover:scale-105">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    Browse Hotels
                                </a>
                                <a href="{{ route('packages.index') }}" 
                                   class="inline-flex items-center px-6 py-3 bg-red-600 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150 transform hover:scale-105">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                    </svg>
                                    Explore Packages
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="grid gap-6">
                    @foreach($bookings as $booking)
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg transform transition duration-300 hover:scale-[1.02] hover:shadow-lg">
                            <div class="p-6">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h2 class="text-xl font-semibold mb-2">
                                            @if($booking->bookable_type === 'App\\Models\\Hotel')
                                                {{ $booking->bookable->name }}
                                            @else
                                                {{ $booking->bookable->name }}
                                            @endif
                                        </h2>
                                        <p class="text-gray-600 mb-2">
                                            <span class="font-semibold">Booking Reference:</span> 
                                            <span class="bg-gray-100 px-2 py-1 rounded">{{ $booking->booking_reference }}</span>
                                        </p>
                                        <p class="text-gray-600 mb-2">
                                            <span class="font-semibold">Status:</span> 
                                            <span class="px-2 py-1 rounded {{ $booking->status === 'confirmed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                                {{ ucfirst($booking->status) }}
                                            </span>
                                        </p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-2xl font-bold text-gray-900">
                                            ₹{{ number_format($booking->total_price, 2) }}
                                        </p>
                                    </div>
                                </div>

                                <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <p class="text-gray-600">
                                            <span class="font-semibold">Start Date:</span>
                                            {{ $booking->start_date->format('M d, Y') }}
                                        </p>
                                        @if($booking->end_date)
                                            <p class="text-gray-600">
                                                <span class="font-semibold">End Date:</span>
                                                {{ $booking->end_date->format('M d, Y') }}
                                            </p>
                                        @endif
                                        <p class="text-gray-600">
                                            <span class="font-semibold">Guests:</span>
                                            {{ $booking->guests }}
                                        </p>
                                    </div>
                                    @if($booking->special_requests)
                                        <div>
                                            <p class="text-gray-600">
                                                <span class="font-semibold">Special Requests:</span>
                                                {{ $booking->special_requests }}
                                            </p>
                                        </div>
                                    @endif
                                </div>

                                <div class="mt-6 flex justify-end space-x-4">
                                    <div class="flex items-center space-x-4">
                                        <a href="{{ route('bookings.show', $booking) }}" 
                                           class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 transform transition duration-300 hover:scale-105">
                                            View Details
                                        </a>
                                        @if($booking->status === 'pending' || $booking->status === 'confirmed')
                                            <a href="{{ route('bookings.edit', $booking) }}" 
                                               class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 transform transition duration-300 hover:scale-105">
                                                Edit Booking
                                            </a>
                                            <form action="{{ route('bookings.destroy', $booking) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 transform transition duration-300 hover:scale-105"
                                                        onclick="return confirm('Are you sure you want to cancel this booking?')">
                                                    Cancel Booking
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-8">
                    {{ $bookings->links() }}
                </div>
            @endif
        </div>
    </div>

    @push('styles')
    <style>
        .animate-fade-in {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    @endpush
</x-app-layout> 