<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            ['name' => 'Haircut', 'description' => 'Basic haircut service', 'price' => 15.00, 'created_at' => now(), 'updated_at'=>now()],
            ['name' => 'Hair Coloring', 'description' => 'Professional hair coloring', 'price' => 50.00, 'created_at' => now(), 'updated_at'=>now()],
            ['name' => 'Shaving', 'description' => 'Men\'s shaving service', 'price' => 10.00, 'created_at' => now(), 'updated_at'=>now()],
            ['name' => 'Facial', 'description' => 'Skin facial treatment', 'price' => 30.00, 'created_at' => now(), 'updated_at'=>now()],
            ['name' => 'Massage', 'description' => 'Relaxing body massage', 'price' => 40.00, 'created_at' => now(), 'updated_at'=>now()],
            ['name' => 'Manicure', 'description' => 'Hand care treatment', 'price' => 25.00, 'created_at' => now(), 'updated_at'=>now()],
            ['name' => 'Pedicure', 'description' => 'Foot care treatment', 'price' => 25.00, 'created_at' => now(), 'updated_at'=>now()],
        ];

        Service::insert($services);

    }
}
