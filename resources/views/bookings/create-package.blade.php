<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-6">Book {{ $bookable->name }}</h2>

                    <form action="{{ route('bookings.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" name="bookable_type" value="App\Models\Package">
                        <input type="hidden" name="bookable_id" value="{{ $bookable->id }}">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="start_date" class="block text-sm font-medium text-gray-700">Tour Start Date</label>
                                <input type="date" name="start_date" id="start_date" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500"
                                    min="{{ date('Y-m-d') }}" required>
                                @error('start_date')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="end_date" class="block text-sm font-medium text-gray-700">Tour End Date</label>
                                <input type="date" name="end_date" id="end_date" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500"
                                    min="{{ date('Y-m-d', strtotime('+1 day')) }}" required>
                                @error('end_date')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="guests" class="block text-sm font-medium text-gray-700">Number of Guests</label>
                                <input type="number" name="guests" id="guests" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500"
                                    min="1" max="{{ $bookable->max_participants }}" value="1" required>
                                @error('guests')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="special_requests" class="block text-sm font-medium text-gray-700">Special Requests</label>
                                <textarea name="special_requests" id="special_requests" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500"
                                    rows="3"></textarea>
                                @error('special_requests')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Package Details</h3>
                            <ul class="space-y-2 text-gray-600">
                                <li><strong>Duration:</strong> {{ $bookable->duration }} days</li>
                                <li><strong>Destination:</strong> {{ $bookable->destination }}</li>
                                <li><strong>Price per person:</strong> ₹{{ number_format($bookable->price, 2) }}</li>
                                <li><strong>Max Participants:</strong> {{ $bookable->max_participants }}</li>
                            </ul>
                        </div>

                        <div class="flex items-center justify-end">
                            <button type="submit" 
                                class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700">
                                Book Now
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 