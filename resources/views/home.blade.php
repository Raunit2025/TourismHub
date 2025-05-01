<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-center mb-8">
                        <h1 class="text-4xl font-bold text-gray-900 mb-4">Welcome to TourismHub</h1>
                        <p class="text-xl text-gray-600">Your one-stop destination for amazing travel experiences</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Hotels Section -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h2 class="text-2xl font-semibold mb-4">Featured Hotels</h2>
                            <p class="text-gray-600 mb-4">Discover comfortable accommodations for your next trip.</p>
                            <a href="{{ route('hotels.index') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">
                                Browse Hotels
                            </a>
                        </div>

                        <!-- Travel Packages Section -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h2 class="text-2xl font-semibold mb-4">Travel Packages</h2>
                            <p class="text-gray-600 mb-4">Explore curated travel packages for unforgettable experiences.</p>
                            <a href="{{ route('packages.index') }}" class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition duration-300">
                                View Packages
                            </a>
                        </div>
                    </div>

                    @guest
                        <div class="mt-8 text-center">
                            <p class="text-gray-600 mb-4">Ready to start your journey?</p>
                            <div class="space-x-4">
                                <a href="{{ route('login') }}" class="inline-block bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 transition duration-300">
                                    Login
                                </a>
                                <a href="{{ route('register') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">
                                    Register
                                </a>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 