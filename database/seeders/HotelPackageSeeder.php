<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hotel;
use App\Models\Package;
use App\Models\User;
use Carbon\Carbon;

class HotelPackageSeeder extends Seeder
{
    public function run()
    {
        // Get the admin user
        $admin = User::where('email', 'admin@tourismhub.com')->first();

        // Sample Hotels
        $hotels = [
            [
                'user_id' => $admin->id,
                'name' => 'Grand Plaza Hotel',
                'description' => 'Experience luxury at its finest in our centrally located hotel. Enjoy stunning city views, premium amenities, and exceptional service.',
                'address' => '123 Park Avenue',
                'city' => 'New York City',
                'country' => 'USA',
                'latitude' => 40.7128,
                'longitude' => -74.0060,
                'phone' => '+1 212-555-1234',
                'email' => 'info@grandplaza.com',
                'website' => 'https://grandplaza.com',
                'star_rating' => 5,
                'is_featured' => true,
                'is_active' => true,
                'amenities' => json_encode(['Free WiFi', 'Swimming Pool', 'Spa', 'Fitness Center', 'Restaurant', 'Room Service', 'Concierge']),
                'images' => json_encode([
                    'https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                    'https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80'
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => $admin->id,
                'name' => 'Beachfront Paradise Resort',
                'description' => 'Wake up to the sound of waves at our beachfront resort. Perfect for families and couples seeking a tropical getaway.',
                'address' => 'Beach Road, North Male Atoll',
                'city' => 'Male',
                'country' => 'Maldives',
                'latitude' => 4.1755,
                'longitude' => 73.5093,
                'phone' => '+960 333-1234',
                'email' => 'info@beachfrontparadise.com',
                'website' => 'https://beachfrontparadise.com',
                'star_rating' => 5,
                'is_featured' => true,
                'is_active' => true,
                'amenities' => json_encode(['Private Beach', 'Ocean View', 'Spa', 'Water Sports', 'Kids Club', 'Beach Bar', 'Free WiFi']),
                'images' => json_encode([
                    'https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                    'https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80'
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => $admin->id,
                'name' => 'Mountain View Lodge',
                'description' => 'Escape to nature in our cozy mountain lodge. Perfect for hiking enthusiasts and those seeking tranquility.',
                'address' => 'Alpine Road 45',
                'city' => 'Zermatt',
                'country' => 'Switzerland',
                'latitude' => 46.0207,
                'longitude' => 7.7491,
                'phone' => '+41 27 967 1234',
                'email' => 'info@mountainviewlodge.com',
                'website' => 'https://mountainviewlodge.com',
                'star_rating' => 4,
                'is_featured' => true,
                'is_active' => true,
                'amenities' => json_encode(['Mountain View', 'Hiking Trails', 'Spa', 'Restaurant', 'Free WiFi', 'Fireplace', 'Ski Storage']),
                'images' => json_encode([
                    'https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                    'https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80'
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        // Sample Tour Packages
        $packages = [
            [
                'name' => 'European Adventure',
                'description' => 'Explore the best of Europe in this 14-day tour covering major cities and hidden gems.',
                'destination' => 'Europe',
                'duration' => 14,
                'price' => 2999.99,
                'max_participants' => 20,
                'start_time' => '09:00',
                'itinerary' => json_encode([
                    'Day 1' => ['Arrival in Paris', 'City Tour', 'Eiffel Tower Visit'],
                    'Day 2' => ['Louvre Museum', 'Seine River Cruise'],
                    'Day 3' => ['Travel to Rome', 'Colosseum Tour'],
                    'Day 4' => ['Vatican City', 'Trevi Fountain'],
                    'Day 5' => ['Travel to Barcelona', 'Sagrada Familia'],
                    'Day 6' => ['Park Güell', 'La Rambla'],
                    'Day 7' => ['Travel to Amsterdam', 'Canal Cruise'],
                    'Day 8' => ['Van Gogh Museum', 'Anne Frank House'],
                    'Day 9' => ['Travel to Berlin', 'Brandenburg Gate'],
                    'Day 10' => ['Berlin Wall', 'Museum Island'],
                    'Day 11' => ['Travel to Prague', 'Charles Bridge'],
                    'Day 12' => ['Prague Castle', 'Old Town Square'],
                    'Day 13' => ['Travel to Vienna', 'Schönbrunn Palace'],
                    'Day 14' => ['St. Stephen\'s Cathedral', 'Departure'],
                ]),
                'inclusions' => json_encode([
                    'Accommodation',
                    'Daily Breakfast',
                    'Transportation',
                    'Guided Tours',
                    'Entrance Fees',
                    'Travel Insurance',
                ]),
                'images' => json_encode([
                    'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2073&q=80',
                    'https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80'
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Asian Discovery',
                'description' => 'Experience the rich cultures and stunning landscapes of Asia in this comprehensive 21-day tour.',
                'destination' => 'Asia',
                'duration' => 21,
                'price' => 3999.99,
                'max_participants' => 15,
                'start_time' => '08:00',
                'itinerary' => json_encode([
                    'Day 1' => ['Arrival in Tokyo', 'Shibuya Crossing', 'Meiji Shrine'],
                    'Day 2' => ['Tsukiji Market', 'Asakusa Temple'],
                    'Day 3' => ['Travel to Kyoto', 'Fushimi Inari Shrine'],
                    'Day 4' => ['Kinkaku-ji', 'Arashiyama Bamboo Forest'],
                    'Day 5' => ['Travel to Seoul', 'Gyeongbokgung Palace'],
                    'Day 6' => ['Namsan Tower', 'Myeongdong'],
                    'Day 7' => ['Travel to Beijing', 'Forbidden City'],
                    'Day 8' => ['Great Wall of China'],
                    'Day 9' => ['Summer Palace', 'Temple of Heaven'],
                    'Day 10' => ['Travel to Shanghai', 'The Bund'],
                    'Day 11' => ['Yu Garden', 'Shanghai Museum'],
                    'Day 12' => ['Travel to Hong Kong', 'Victoria Peak'],
                    'Day 13' => ['Star Ferry', 'Temple Street Night Market'],
                    'Day 14' => ['Travel to Bangkok', 'Grand Palace'],
                    'Day 15' => ['Wat Arun', 'Chatuchak Market'],
                    'Day 16' => ['Travel to Singapore', 'Marina Bay Sands'],
                    'Day 17' => ['Gardens by the Bay', 'Chinatown'],
                    'Day 18' => ['Travel to Bali', 'Uluwatu Temple'],
                    'Day 19' => ['Tegallalang Rice Terrace', 'Ubud Monkey Forest'],
                    'Day 20' => ['Mount Batur Sunrise Trek'],
                    'Day 21' => ['Beach Day', 'Departure'],
                ]),
                'inclusions' => json_encode([
                    'Accommodation',
                    'Daily Breakfast',
                    'Internal Flights',
                    'Guided Tours',
                    'Entrance Fees',
                    'Travel Insurance',
                    'Cultural Experiences',
                ]),
                'images' => json_encode([
                    'https://images.unsplash.com/photo-1464817739973-0128fe77aaa1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                    'https://images.unsplash.com/photo-1523413651479-597eb2da0ad6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80'
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        // Insert hotels and packages
        Hotel::insert($hotels);
        Package::insert($packages);
    }
} 