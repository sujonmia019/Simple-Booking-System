<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bookings = [
            ['user_id'=>2,'service_id'=>1,'booking_date'=>now()->toDateString(),'created_at'=>now(),'updated_at'=>now()],
            ['user_id'=>2,'service_id'=>2,'booking_date'=>now()->toDateString(),'created_at'=>now(),'updated_at'=>now()],
            ['user_id'=>2,'service_id'=>3,'booking_date'=>now()->toDateString(),'created_at'=>now(),'updated_at'=>now()],
            ['user_id'=>3,'service_id'=>4,'booking_date'=>now()->toDateString(),'created_at'=>now(),'updated_at'=>now()],
            ['user_id'=>3,'service_id'=>5,'booking_date'=>now()->toDateString(),'created_at'=>now(),'updated_at'=>now()],
            ['user_id'=>3,'service_id'=>6,'booking_date'=>now()->toDateString(),'created_at'=>now(),'updated_at'=>now()],
        ];

        Booking::insert($bookings);
    }
}
