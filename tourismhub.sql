-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2025 at 10:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourismhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `bookable_type` varchar(255) NOT NULL,
  `bookable_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `guests` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('pending','confirmed','cancelled','completed') NOT NULL DEFAULT 'pending',
  `special_requests` text DEFAULT NULL,
  `booking_reference` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `bookable_type`, `bookable_id`, `start_date`, `end_date`, `guests`, `total_price`, `status`, `special_requests`, `booking_reference`, `created_at`, `updated_at`) VALUES
(1, 2, 'App\\Models\\Hotel', 1, '2025-04-30', '2025-05-01', 2, 30000.00, 'pending', 'fdaf', 'BOOK-680F5CF71A955', '2025-04-28 05:18:23', '2025-04-28 05:18:23'),
(2, 4, 'App\\Models\\Hotel', 1, '2025-05-21', '2025-05-29', 5, 600000.00, 'pending', NULL, 'BOOK-68144D5C93650', '2025-05-01 23:13:08', '2025-05-01 23:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_admin@tourismhub.com|127.0.0.1', 'i:1;', 1745838785),
('laravel_cache_admin@tourismhub.com|127.0.0.1:timer', 'i:1745838785;', 1745838785);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `star_rating` int(11) NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `price_per_night` decimal(10,2) NOT NULL,
  `amenities` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`amenities`)),
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`images`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `user_id`, `name`, `description`, `address`, `city`, `country`, `latitude`, `longitude`, `phone`, `email`, `website`, `star_rating`, `is_featured`, `is_active`, `price_per_night`, `amenities`, `images`, `created_at`, `updated_at`) VALUES
(1, 1, 'Grand Luxury Resort & Spa', 'Experience unparalleled luxury at our 5-star resort featuring world-class amenities, spa services, and breathtaking ocean views.', '123 Ocean Drive', 'Male', 'Maldives', 4.17550000, 73.50930000, '+960 333-1234', 'info@grandluxury.com', 'https://grandluxury.com', 5, 1, 1, 15000.00, '[\"Free WiFi\",\"Swimming Pool\",\"Spa\",\"Fitness Center\",\"Restaurant\"]', '[\"https:\\/\\/images.unsplash.com\\/photo-1571896349842-33c89424de2d\"]', '2025-04-28 05:16:20', '2025-04-28 05:16:20'),
(2, 1, 'Mountain View Lodge', 'Nestled in the heart of the Swiss Alps, this cozy lodge offers stunning mountain views and authentic alpine experiences.', 'Alpine Road 45', 'Zermatt', 'Switzerland', 46.02070000, 7.74910000, '+41 27 967 1234', 'info@mountainview.com', 'https://mountainview.com', 4, 1, 1, 12000.00, '[\"Hiking Trails\",\"Spa\",\"Restaurant\",\"Free WiFi\",\"Fireplace\"]', '[\"https:\\/\\/images.unsplash.com\\/photo-1520250497591-112f2f40a3f4\"]', '2025-04-28 05:16:20', '2025-04-28 05:16:20'),
(3, 1, 'Urban Boutique Hotel', 'A modern boutique hotel in the heart of the city, offering stylish accommodations and easy access to major attractions.', '456 5th Avenue', 'New York', 'USA', 40.71280000, -74.00600000, '+1 212-555-1234', 'info@urbanboutique.com', 'https://urbanboutique.com', 4, 0, 1, 8000.00, '[\"Free WiFi\",\"Restaurant\",\"Bar\",\"Business Center\"]', '[\"https:\\/\\/images.unsplash.com\\/photo-1566073771259-6a8506099945\"]', '2025-04-28 05:16:20', '2025-04-28 05:16:20'),
(4, 1, 'Desert Oasis Resort', 'Escape to this luxurious desert resort featuring private pools, spa treatments, and authentic Middle Eastern cuisine.', 'Dubai Desert', 'Dubai', 'United Arab Emirates', 25.27698700, 55.29623300, '+971 4 399 7777', 'info@desertoasis.com', 'https://desertoasis.com', 5, 1, 1, 18000.00, '[\"Free WiFi\",\"Swimming Pool\",\"Spa\",\"Fitness Center\",\"Restaurant\"]', '[\"https:\\/\\/images.unsplash.com\\/photo-1582719478250-c89cae4dc85b\"]', '2025-04-28 05:16:20', '2025-04-28 05:16:20'),
(5, 1, 'Tropical Paradise Resort', 'A beachfront paradise offering water sports, tropical gardens, and authentic island experiences.', 'Jl. Raya Uluwatu', 'Kuta', 'Indonesia', -8.72286500, 115.11498600, '+62 361 8462888', 'info@tropicalparadise.com', 'https://tropicalparadise.com', 4, 1, 1, 10000.00, '[\"Free WiFi\",\"Swimming Pool\",\"Spa\",\"Fitness Center\",\"Restaurant\"]', '[\"https:\\/\\/images.unsplash.com\\/photo-1571003123894-1f0594d2b5d9\"]', '2025-04-28 05:16:20', '2025-04-28 05:16:20'),
(6, 1, 'Historic Castle Hotel', 'Stay in a beautifully restored medieval castle featuring period furnishings and modern amenities.', 'Castle Hill', 'Edinburgh', 'Scotland', 55.95520000, -3.18830000, '+44 131 225 5000', 'info@historiccastle.com', 'https://historiccastle.com', 4, 1, 1, 9000.00, '[\"Free WiFi\",\"Spa\",\"Restaurant\",\"Business Center\"]', '[\"https:\\/\\/images.unsplash.com\\/photo-1542314831-068cd1dbfeeb\"]', '2025-04-28 05:16:20', '2025-04-28 05:16:20'),
(7, 1, 'Ski Resort & Spa', 'World-class skiing facilities combined with luxury accommodations and spa services.', 'Aspen Mountain', 'Aspen', 'USA', 39.19110000, -106.81750000, '+1 970 925 8000', 'info@skiresort.com', 'https://skiresort.com', 5, 1, 1, 14000.00, '[\"Free WiFi\",\"Spa\",\"Restaurant\",\"Fitness Center\",\"Ski Rentals\"]', '[\"https:\\/\\/images.unsplash.com\\/photo-1511886929837-354984b7fce0\"]', '2025-04-28 05:16:20', '2025-04-28 05:16:20'),
(8, 1, 'Vineyard Estate', 'Experience wine country living in this elegant estate surrounded by vineyards and rolling hills.', '123 Vineyard Lane', 'Tuscany', 'Italy', 43.54430000, 11.15890000, '+39 055 802 1234', 'info@vineyardestate.com', 'https://vineyardestate.com', 4, 1, 1, 11000.00, '[\"Free WiFi\",\"Swimming Pool\",\"Spa\",\"Fitness Center\",\"Restaurant\"]', '[\"https:\\/\\/images.unsplash.com\\/photo-1517248135467-4c7edcad34c4\"]', '2025-04-28 05:16:20', '2025-04-28 05:16:20'),
(9, 1, 'Treehouse Retreat', 'Unique treehouse accommodations in a lush rainforest setting, perfect for nature lovers.', 'Rainforest Trail', 'Costa Rica', 'Costa Rica', 10.24640000, -84.24340000, '+506 2693 1234', 'info@treehouseretreat.com', 'https://treehouseretreat.com', 3, 0, 1, 6000.00, '[\"Free WiFi\",\"Swimming Pool\",\"Spa\",\"Fitness Center\",\"Restaurant\"]', '[\"https:\\/\\/images.unsplash.com\\/photo-1518780664697-55e3ad937233\"]', '2025-04-28 05:16:20', '2025-04-28 05:16:20');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(12, '0001_01_01_000000_create_users_table', 1),
(13, '0001_01_01_000001_create_cache_table', 1),
(14, '0001_01_01_000002_create_jobs_table', 1),
(15, '2024_03_21_000002_create_hotels_table', 1),
(16, '2024_03_21_000002_create_packages_table', 1),
(17, '2024_03_21_000003_create_bookings_table', 1),
(18, '2024_03_21_000006_create_reviews_table', 1),
(19, '2025_04_28_061956_add_is_admin_to_users_table', 1),
(20, '2025_04_28_062133_create_rooms_table', 1),
(21, '2025_04_28_084006_add_is_active_to_packages_table', 1),
(22, '2025_04_28_090630_update_bookings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `destination` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `max_participants` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `itinerary` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`itinerary`)),
  `inclusions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`inclusions`)),
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`images`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `description`, `destination`, `duration`, `price`, `max_participants`, `start_time`, `itinerary`, `inclusions`, `images`, `created_at`, `updated_at`, `is_active`) VALUES
(1, 'European Grand Tour', 'Explore the best of Europe with this comprehensive tour covering major cities and cultural landmarks.', 'Europe', 14, 2500.00, 20, '09:00:00', '[\"Day 1: Paris - Eiffel Tower and Seine River Cruise\",\"Day 2: Paris - Louvre Museum and Notre-Dame\",\"Day 3: Travel to Rome\"]', '[\"Hotel accommodations\",\"Breakfast daily\",\"Guided tours\",\"Transportation\"]', '[\"https:\\/\\/images.unsplash.com\\/photo-1499856871958-5b9627545d1a\"]', '2025-04-28 05:16:20', '2025-04-28 05:16:20', 1),
(2, 'Safari Adventure', 'Experience the thrill of African wildlife with guided safari tours and luxury accommodations.', 'Tanzania', 7, 1800.00, 12, '06:00:00', '[\"Day 1: Arrival and Safari Briefing\",\"Day 2: Serengeti National Park\",\"Day 3: Ngorongoro Crater\"]', '[\"Luxury tented camps\",\"All meals\",\"Game drives\",\"Professional guide\"]', '[\"https:\\/\\/images.unsplash.com\\/photo-1516426122078-c23e76319801\"]', '2025-04-28 05:16:20', '2025-04-28 05:16:20', 1),
(3, 'Asian Cultural Journey', 'Immerse yourself in the rich cultures of Asia with visits to temples, markets, and historical sites.', 'Asia', 10, 2200.00, 15, '08:00:00', '[\"Day 1: Arrival in Tokyo\",\"Day 2: Kyoto - Fushimi Inari Shrine and Kinkaku-ji\",\"Day 3: Osaka - Castle and Floating Garden\",\"Day 4: Kyoto - Nijo Castle and Arashiyama\",\"Day 5: Tokyo - Meiji Shrine and Harajuku\"]', '[\"Hotel accommodations\",\"Breakfast daily\",\"Guided tours\",\"Transportation\"]', '[\"https:\\/\\/images.unsplash.com\\/photo-1528181304800-259b08848526\"]', '2025-04-28 05:16:20', '2025-04-28 05:16:20', 1),
(4, 'Caribbean Cruise', 'Sail through crystal-clear waters, visit tropical islands, and enjoy onboard entertainment.', 'Caribbean', 8, 1500.00, 100, '12:00:00', '[\"Day 1: Departure from Miami\",\"Day 2: Nassau, Bahamas\",\"Day 3: St. Thomas, USVI\",\"Day 4: St. Maarten\",\"Day 5: Arrival in Miami\"]', '[\"All meals\",\"Entertainment\",\"Transportation\"]', '[\"https:\\/\\/images.unsplash.com\\/photo-1548574505-5e239809ee19\"]', '2025-04-28 05:16:20', '2025-04-28 05:16:20', 1),
(5, 'Northern Lights Expedition', 'Chase the aurora borealis in this unique Arctic adventure with expert guides.', 'Arctic', 5, 1200.00, 10, '02:00:00', '[\"Day 1: Departure from Reykjav\\u00edk\",\"Day 2: Crossing the Arctic Circle\",\"Day 3: Aurora Sky Watching\",\"Day 4: Return to Reykjav\\u00edk\",\"Day 5: Arrival in Reykjav\\u00edk\"]', '[\"Hotel accommodations\",\"All meals\",\"Guided tours\",\"Transportation\"]', '[\"https:\\/\\/images.unsplash.com\\/photo-1483347756197-71ef80a95d73\"]', '2025-04-28 05:16:20', '2025-04-28 05:16:20', 1),
(6, 'Wine Country Tour', 'Visit renowned vineyards, enjoy wine tastings, and learn about winemaking processes.', 'Tuscany', 6, 950.00, 10, '10:00:00', '[\"Day 1: Arrival in Florence\",\"Day 2: Chianti Region\",\"Day 3: Siena\",\"Day 4: Montalcino\",\"Day 5: Return to Florence\"]', '[\"Hotel accommodations\",\"Breakfast daily\",\"Guided tours\",\"Wine tasting\"]', '[\"https:\\/\\/images.unsplash.com\\/photo-1510812431401-41d2bd2722f3\"]', '2025-04-28 05:16:20', '2025-04-28 05:16:20', 1),
(7, 'Adventure Sports Package', 'Thrill-seekers paradise with activities like rock climbing, white-water rafting, and zip-lining.', 'Adventure', 4, 800.00, 10, '09:00:00', '[\"Day 1: Arrival in the Adventure Zone\",\"Day 2: Rock Climbing\",\"Day 3: White-Water Rafting\",\"Day 4: Zip-Lining\"]', '[\"Hotel accommodations\",\"All meals\",\"Guided tours\",\"Transportation\"]', '[\"https:\\/\\/images.unsplash.com\\/photo-1530549387789-4c1017266635\"]', '2025-04-28 05:16:20', '2025-04-28 05:16:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reviewable_type` varchar(255) NOT NULL,
  `reviewable_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`images`)),
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hotel_id` bigint(20) UNSIGNED NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `capacity` int(11) NOT NULL,
  `price_per_night` decimal(10,2) NOT NULL,
  `number_of_rooms` int(11) NOT NULL,
  `amenities` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`amenities`)),
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`images`)),
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `hotel_id`, `room_type`, `description`, `capacity`, `price_per_night`, `number_of_rooms`, `amenities`, `images`, `is_available`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ocean View Suite', 'Luxurious suite with panoramic ocean views', 2, 500.00, 10, '\"[\\\"King Bed\\\",\\\"Balcony\\\",\\\"Mini Bar\\\"]\"', '\"[\\\"suite1.jpg\\\",\\\"suite2.jpg\\\"]\"', 1, '2025-04-28 05:16:20', '2025-04-28 05:16:20'),
(2, 2, 'Mountain Cabin', 'Rustic cabin with mountain views', 4, 300.00, 5, '\"[\\\"2 Queen Beds\\\",\\\"Fireplace\\\",\\\"Kitchen\\\"]\"', '\"[\\\"cabin1.jpg\\\",\\\"cabin2.jpg\\\"]\"', 1, '2025-04-28 05:16:20', '2025-04-28 05:16:20');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3WYWglSXS5hYzYlFzL6nDIEfKIVzw9f2Gs5wErSM', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRFFEQzJnVnowTzBaMUpRSHFNZ1pFYndWS1prUGxtYTdQZkZhcmYyMCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9maWxlIjt9czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7fQ==', 1746162718);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'Admin User', 'admin@tourismhub.com', '2025-04-28 05:16:20', '$2y$12$S5lBpDYeM.IhH8uaOVbR/.jlHdqPKzkLKAX.iJhWO0e4Nit700DD6', NULL, '2025-04-28 05:16:20', '2025-04-28 05:16:20', 1),
(2, 'John Doe', 'john@example.com', '2025-04-28 05:16:20', '$2y$12$xYWAro6kM0qDXu828bwJiew4Bpy7GuIjjegc4GK8/zGZa7gDElk3.', NULL, '2025-04-28 05:16:20', '2025-04-28 05:16:20', 0),
(3, 'Jane Smith', 'jane@example.com', '2025-04-28 05:16:20', '$2y$12$JTvoRqyDJcCz5x2nCrxp/OSJN4BB5bl0RP4y1wHCWZYngCbtiIy56', NULL, '2025-04-28 05:16:20', '2025-04-28 05:16:20', 0),
(4, 'harshit', 'harshit123@gmail.com', NULL, '$2y$12$Vr6DDgw4atDyLkyst0litODc4U6BzMuDzq4PY9kT1DUd02IiLrbkW', NULL, '2025-05-01 23:11:45', '2025-05-01 23:11:45', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bookings_booking_reference_unique` (`booking_reference`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_bookable_type_bookable_id_index` (`bookable_type`,`bookable_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotels_user_id_foreign` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_reviewable_type_reviewable_id_index` (`reviewable_type`,`reviewable_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_hotel_id_foreign` (`hotel_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
