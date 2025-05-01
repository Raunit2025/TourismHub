<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="max-w-2xl mx-auto">
                        <h2 class="text-2xl font-bold mb-6">Edit Booking</h2>

                        @if (session('error'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <span class="block sm:inline">{{ session('error') }}</span>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('bookings.update', $booking) }}" class="space-y-6">
                            @csrf
                            @method('PUT')

                            <!-- Booking Type (readonly) -->
                            <div>
                                <x-input-label for="booking_type" :value="__('Booking Type')" />
                                <input type="text" id="booking_type" value="{{ class_basename($booking->bookable) }}" class="block mt-1 w-full rounded-md border-gray-300 bg-gray-100" readonly>
                            </div>

                            <!-- Item Name (readonly) -->
                            <div>
                                <x-input-label for="item_name" :value="__('Item Name')" />
                                <input type="text" id="item_name" value="{{ $booking->bookable->name ?? $booking->bookable->title }}" class="block mt-1 w-full rounded-md border-gray-300 bg-gray-100" readonly>
                            </div>

                            <!-- Check-in Date -->
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="start_date" class="block text-sm font-medium text-gray-700">
                                        {{ $booking->bookable instanceof \App\Models\Hotel ? 'Check-in Date' : 'Tour Start Date' }}
                                    </label>
                                    <input type="date" name="start_date" id="start_date" 
                                           value="{{ old('start_date', $booking->start_date->format('Y-m-d')) }}"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                           required>
                                    @error('start_date')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="end_date" class="block text-sm font-medium text-gray-700">
                                        {{ $booking->bookable instanceof \App\Models\Hotel ? 'Check-out Date' : 'Tour End Date' }}
                                    </label>
                                    <input type="date" name="end_date" id="end_date" 
                                           value="{{ old('end_date', $booking->end_date->format('Y-m-d')) }}"
                                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                           required>
                                    @error('end_date')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Number of Guests -->
                            <div>
                                <x-input-label for="guests" :value="__('Number of Guests')" />
                                <x-text-input id="guests" class="block mt-1 w-full" type="number" name="guests" 
                                    :value="old('guests', $booking->guests)" 
                                    min="1" 
                                    :max="$booking->bookable instanceof \App\Models\Package ? $booking->bookable->max_participants : null"
                                    required />
                                <x-input-error :messages="$errors->get('guests')" class="mt-2" />
                            </div>

                            <!-- Special Requests -->
                            <div>
                                <x-input-label for="special_requests" :value="__('Special Requests')" />
                                <textarea id="special_requests" name="special_requests" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" rows="3">{{ old('special_requests', $booking->special_requests) }}</textarea>
                                <x-input-error :messages="$errors->get('special_requests')" class="mt-2" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <a href="{{ route('bookings.index') }}" class="mr-4 text-gray-600 hover:text-gray-900">
                                    Cancel
                                </a>
                                <button type="submit" class="bg-blue-600 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:bg-blue-700 transition duration-150 ease-in-out">
                                    {{ __('Update Booking') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 