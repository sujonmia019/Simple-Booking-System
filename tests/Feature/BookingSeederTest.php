<?php

namespace Tests\Feature;

use Tests\TestCase;
use Database\Seeders\UserSeeder;
use Database\Seeders\BookingSeeder;
use Database\Seeders\ServiceSeeder;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookingSeederTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_seeded_bookings_exist(): void
    {
        // Seed dependencies first
        $this->seed(UserSeeder::class);
        $this->seed(ServiceSeeder::class);
        $this->seed(BookingSeeder::class);

        // Check some bookings exist
        $this->assertDatabaseHas('bookings', [
            'user_id' => 2,
            'service_id' => 1,
        ]);

        $this->assertDatabaseHas('bookings', [
            'user_id' => 2,
            'service_id' => 2,
        ]);

        $this->assertDatabaseHas('bookings', [
            'user_id' => 3,
            'service_id' => 4,
        ]);
    }
}
