<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TourismHub') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Lottie Player -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <!-- Styles -->
    <style>
        :root {
            --primary-color: #dc2626;
            --primary-hover: #b91c1c;
            --secondary-color: #ffffff;
            --text-color: #1f2937;
            --light-red: #fee2e2;
            --dark-red: #991b1b;
        }

        body {
            @apply bg-gray-50;
        }

        .btn-primary {
            @apply bg-red-600 text-white px-4 py-2 rounded-md transition-all duration-300 hover:bg-red-700 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 shadow-sm hover:shadow-md;
        }

        .btn-secondary {
            @apply bg-white text-red-600 border border-red-600 px-4 py-2 rounded-md transition-all duration-300 hover:bg-red-50 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 shadow-sm hover:shadow-md;
        }

        .card {
            @apply bg-white rounded-lg shadow-md transition-all duration-300 hover:shadow-lg hover:scale-[1.02] overflow-hidden;
        }

        .card-header {
            @apply bg-red-600 text-white px-4 py-3;
        }

        .card-body {
            @apply p-4;
        }

        .nav-link {
            @apply text-white hover:text-red-100 transition-colors duration-300;
        }

        .nav-link.active {
            @apply text-red-100 font-semibold;
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .slide-in {
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from { transform: translateX(-20px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        .table-header {
            @apply bg-red-600 text-white;
        }

        .table-row {
            @apply hover:bg-red-50 transition-colors duration-200;
        }

        .status-badge {
            @apply px-2 py-1 rounded-full text-xs font-semibold transition-all duration-300;
        }

        .status-pending {
            @apply bg-yellow-100 text-yellow-800;
        }

        .status-confirmed {
            @apply bg-green-100 text-green-800;
        }

        .status-cancelled {
            @apply bg-red-100 text-red-800;
        }

        /* Form styles */
        .form-input {
            @apply block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 transition-all duration-300;
        }

        .form-label {
            @apply block text-sm font-medium text-gray-700 mb-1;
        }

        .form-error {
            @apply mt-1 text-sm text-red-600;
        }

        /* Loading spinner */
        .spinner {
            @apply animate-spin h-5 w-5 text-red-600;
        }

        /* Toast notifications */
        .toast {
            @apply fixed bottom-4 right-4 p-4 rounded-lg shadow-lg transform transition-all duration-300;
        }

        .toast-success {
            @apply bg-green-500 text-white;
        }

        .toast-error {
            @apply bg-red-500 text-white;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            @apply w-2;
        }

        ::-webkit-scrollbar-track {
            @apply bg-gray-100;
        }

        ::-webkit-scrollbar-thumb {
            @apply bg-red-500 rounded-full hover:bg-red-600 transition-colors duration-300;
        }

        /* Lottie Animation Styles */
        .lottie-container {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .lottie-small {
            width: 24px;
            height: 24px;
        }
        
        .lottie-medium {
            width: 48px;
            height: 48px;
        }
        
        .lottie-large {
            width: 96px;
            height: 96px;
        }

        /* Modern Button Styles */
        .modern-btn {
            @apply relative overflow-hidden transition-all duration-300;
        }

        .modern-btn::before {
            content: '';
            @apply absolute inset-0 bg-white opacity-0 transform scale-x-0 origin-left transition-transform duration-300;
        }

        .modern-btn:hover::before {
            @apply opacity-10 scale-x-100;
        }

        /* Card Hover Effects */
        .card-hover {
            @apply transition-all duration-300;
        }

        .card-hover:hover {
            @apply transform -translate-y-1 shadow-lg;
        }

        /* Input Focus Effects */
        .input-focus {
            @apply transition-all duration-300;
        }

        .input-focus:focus {
            @apply ring-2 ring-red-500 border-red-500;
        }

        /* Navigation Link Effects */
        .nav-effect {
            @apply relative overflow-hidden;
        }

        .nav-effect::after {
            content: '';
            @apply absolute bottom-0 left-0 w-full h-0.5 bg-white transform scale-x-0 origin-left transition-transform duration-300;
        }

        .nav-effect:hover::after {
            @apply scale-x-100;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-50">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow-lg transform transition-all duration-300">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="fade-in">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>

    <!-- Toast Container -->
    <div id="toast-container" class="fixed bottom-4 right-4 z-50"></div>

    <!-- Loading Overlay -->
    <div id="loading-overlay" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="spinner"></div>
    </div>
</body>
</html> 