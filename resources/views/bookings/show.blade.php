<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="max-w-2xl mx-auto">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl font-bold">Booking Details</h2>
                            <a href="{{ route('bookings.index') }}" class="text-blue-600 hover:text-blue-900">
                                Back to Bookings
                            </a>
                        </div>

                        <div class="space-y-6">
                            <!-- Booking Type and Item -->
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500">Booking Type</h3>
                                    <p class="mt-1 text-sm text-gray-900">{{ class_basename($booking->bookable) }}</p>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500">Item Name</h3>
                                    <p class="mt-1 text-sm text-gray-900">{{ $booking->bookable->name ?? $booking->bookable->title }}</p>
                                </div>
                            </div>

                            <!-- Dates -->
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500">Check-in Date</h3>
                                    <p class="mt-1 text-sm text-gray-900">{{ $booking->start_date ? $booking->start_date->format('M d, Y') : 'N/A' }}</p>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500">Check-out Date</h3>
                                    <p class="mt-1 text-sm text-gray-900">{{ $booking->end_date ? $booking->end_date->format('M d, Y') : 'N/A' }}</p>
                                </div>
                            </div>

                            <!-- Guests and Price -->
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500">Number of Guests</h3>
                                    <p class="mt-1 text-sm text-gray-900">{{ $booking->guests }}</p>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500">Total Price</h3>
                                    <p class="mt-1 text-sm text-gray-900">₹{{ number_format($booking->total_price, 2) }}</p>
                                </div>
                            </div>

                            <!-- Status -->
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Status</h3>
                                <p class="mt-1">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $booking->status === 'confirmed' ? 'bg-green-100 text-green-800' : 
                                           ($booking->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                                           'bg-red-100 text-red-800') }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </p>
                            </div>

                            <!-- Special Requests -->
                            @if($booking->special_requests)
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500">Special Requests</h3>
                                    <p class="mt-1 text-sm text-gray-900">{{ $booking->special_requests }}</p>
                                </div>
                            @endif

                            <!-- Actions -->
                            @if($booking->status === 'pending')
                                <div class="flex items-center space-x-4 pt-4">
                                    <a href="{{ route('bookings.edit', $booking) }}" 
                                       class="bg-indigo-400 text-white px-4 py-2 rounded-md hover:bg-indigo-300">
                                        Edit Booking
                                    </a>
                                    <form action="{{ route('bookings.destroy', $booking) }}" 
                                          method="POST" 
                                          class="inline"
                                          onsubmit="return confirm('Are you sure you want to cancel this booking?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">
                                            Cancel Booking
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function confirmDelete(bookingId) {
            if (confirm('Are you sure you want to cancel this booking?')) {
                document.getElementById('delete-form-' + bookingId).submit();
            }
        }
    </script>
    @endpush
</x-app-layout> 