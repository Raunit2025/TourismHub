<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $table = 'packages';

    protected $fillable = [
        'name',
        'description',
        'destination',
        'duration',
        'price',
        'max_participants',
        'start_time',
        'itinerary',
        'inclusions',
        'images',
    ];

    protected $casts = [
        'itinerary' => 'array',
        'inclusions' => 'array',
        'images' => 'array',
        'price' => 'decimal:2',
        'duration' => 'integer',
        'max_participants' => 'integer',
    ];

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function bookings()
    {
        return $this->morphMany(Booking::class, 'bookable');
    }
} 