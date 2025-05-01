<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="max-w-2xl mx-auto">
                        <h2 class="text-2xl font-bold mb-6">Create New Booking</h2>

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

                        <form method="POST" action="{{ route('bookings.store') }}" class="space-y-6" id="bookingForm">
                            @csrf

                            <!-- Booking Type -->
                            <div>
                                <x-input-label for="booking_type" :value="__('Booking Type')" />
                                <select id="booking_type" name="booking_type" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                    <option value="">Select Booking Type</option>
                                    <option value="hotel" {{ old('booking_type', $preSelectedType) == 'hotel' ? 'selected' : '' }}>Hotel</option>
                                    <option value="package" {{ old('booking_type', $preSelectedType) == 'package' ? 'selected' : '' }}>Travel Package</option>
                                </select>
                                <x-input-error :messages="$errors->get('booking_type')" class="mt-2" />
                            </div>

                            <!-- Hotel Selection (initially hidden) -->
                            <div id="hotel_section" class="hidden">
                                <x-input-label for="hotel_id" :value="__('Select Hotel')" />
                                <select id="hotel_id" name="hotel_id" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="">Select a Hotel</option>
                                    @foreach($hotels as $hotel)
                                        <option value="{{ $hotel->id }}" {{ old('hotel_id', $preSelectedType == 'hotel' ? $preSelectedId : '') == $hotel->id ? 'selected' : '' }}>
                                            {{ $hotel->name }} - ${{ number_format($hotel->price_per_night, 2) }}/night
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('hotel_id')" class="mt-2" />
                            </div>

                            <!-- Package Selection (initially hidden) -->
                            <div id="package_section" class="hidden">
                                <x-input-label for="package_id" :value="__('Select Travel Package')" />
                                <select id="package_id" name="package_id" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="">Select a Package</option>
                                    @foreach($packages as $package)
                                        <option value="{{ $package->id }}" {{ old('package_id', $preSelectedType == 'package' ? $preSelectedId : '') == $package->id ? 'selected' : '' }}>
                                            {{ $package->title }} - ${{ number_format($package->price, 2) }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('package_id')" class="mt-2" />
                            </div>

                            <!-- Check-in Date -->
                            <div>
                                <x-input-label for="check_in_date" :value="__('Check-in Date')" />
                                <x-text-input id="check_in_date" class="block mt-1 w-full" type="date" name="check_in_date" :value="old('check_in_date')" required />
                                <x-input-error :messages="$errors->get('check_in_date')" class="mt-2" />
                            </div>

                            <!-- Check-out Date -->
                            <div>
                                <x-input-label for="check_out_date" :value="__('Check-out Date')" />
                                <x-text-input id="check_out_date" class="block mt-1 w-full" type="date" name="check_out_date" :value="old('check_out_date')" required />
                                <x-input-error :messages="$errors->get('check_out_date')" class="mt-2" />
                            </div>

                            <!-- Number of Guests -->
                            <div>
                                <x-input-label for="guests" :value="__('Number of Guests')" />
                                <x-text-input id="guests" class="block mt-1 w-full" type="number" name="guests" :value="old('guests', 1)" min="1" required />
                                <x-input-error :messages="$errors->get('guests')" class="mt-2" />
                            </div>

                            <!-- Special Requests -->
                            <div>
                                <x-input-label for="special_requests" :value="__('Special Requests')" />
                                <textarea id="special_requests" name="special_requests" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" rows="3">{{ old('special_requests') }}</textarea>
                                <x-input-error :messages="$errors->get('special_requests')" class="mt-2" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="bg-blue-600 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:bg-blue-700 transition duration-150 ease-in-out">
                                    {{ __('Create Booking') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const bookingType = document.getElementById('booking_type');
            const hotelSection = document.getElementById('hotel_section');
            const packageSection = document.getElementById('package_section');
            const hotelSelect = document.getElementById('hotel_id');
            const packageSelect = document.getElementById('package_id');
            const form = document.getElementById('bookingForm');

            // Function to toggle sections
            function toggleSections() {
                const selectedType = bookingType.value;
                if (selectedType === 'hotel') {
                    hotelSection.classList.remove('hidden');
                    packageSection.classList.add('hidden');
                    hotelSelect.required = true;
                    packageSelect.required = false;
                    packageSelect.value = ''; // Clear package selection
                } else if (selectedType === 'package') {
                    hotelSection.classList.add('hidden');
                    packageSection.classList.remove('hidden');
                    hotelSelect.required = false;
                    packageSelect.required = true;
                    hotelSelect.value = ''; // Clear hotel selection
                } else {
                    hotelSection.classList.add('hidden');
                    packageSection.classList.add('hidden');
                    hotelSelect.required = false;
                    packageSelect.required = false;
                    hotelSelect.value = ''; // Clear selections
                    packageSelect.value = '';
                }
            }

            // Handle booking type change
            bookingType.addEventListener('change', toggleSections);

            // Handle form submission
            form.addEventListener('submit', function(e) {
                const selectedType = bookingType.value;
                if (selectedType === 'hotel' && !hotelSelect.value) {
                    e.preventDefault();
                    alert('Please select a hotel');
                    return false;
                }
                if (selectedType === 'package' && !packageSelect.value) {
                    e.preventDefault();
                    alert('Please select a package');
                    return false;
                }
            });

            // Initialize sections based on old input or pre-selected values
            if (bookingType.value) {
                toggleSections();
            }
        });
    </script>
    @endpush
</x-app-layout> 