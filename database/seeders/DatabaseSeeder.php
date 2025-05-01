<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            HotelAndPackageSeeder::class,
        ]);

        // Get admin user for relationships
        $admin = User::where('email', 'admin@tourismhub.com')->first();

        // Create rooms
        Room::create([
            'hotel_id' => 1,
            'room_type' => 'Ocean View Suite',
            'description' => 'Luxurious suite with panoramic ocean views',
            'capacity' => 2,
            'price_per_night' => 500.00,
            'number_of_rooms' => 10,
            'amenities' => json_encode(['King Bed', 'Balcony', 'Mini Bar']),
            'images' => json_encode(['suite1.jpg', 'suite2.jpg']),
            'is_available' => true,
        ]);

        Room::create([
            'hotel_id' => 2,
            'room_type' => 'Mountain Cabin',
            'description' => 'Rustic cabin with mountain views',
            'capacity' => 4,
            'price_per_night' => 300.00,
            'number_of_rooms' => 5,
            'amenities' => json_encode(['2 Queen Beds', 'Fireplace', 'Kitchen']),
            'images' => json_encode(['cabin1.jpg', 'cabin2.jpg']),
            'is_available' => true,
        ]);
    }
}
