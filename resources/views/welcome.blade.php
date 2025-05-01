<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl font-bold mb-4">Welcome to TourismHub</h1>
                    <p class="text-lg mb-4">Your one-stop destination for travel planning and bookings.</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h2 class="text-xl font-semibold mb-3">Explore Hotels</h2>
                            <p class="mb-4">Find the perfect accommodation for your next adventure.</p>
                            <a href="{{ route('hotels.index') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Browse Hotels</a>
                        </div>
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h2 class="text-xl font-semibold mb-3">Travel Packages</h2>
                            <p class="mb-4">Discover curated travel packages for unforgettable experiences.</p>
                            <a href="{{ route('packages.index') }}" class="inline-block bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">View Packages</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
