<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            ['name' => 'Haircut', 'description' => 'Basic haircut service', 'price' => 15.00],
            ['name' => 'Hair Coloring', 'description' => 'Professional hair coloring', 'price' => 50.00],
            ['name' => 'Shaving', 'description' => 'Men\'s shaving service', 'price' => 10.00],
            ['name' => 'Facial', 'description' => 'Skin facial treatment', 'price' => 30.00],
            ['name' => 'Massage', 'description' => 'Relaxing body massage', 'price' => 40.00],
            ['name' => 'Manicure', 'description' => 'Hand care treatment', 'price' => 25.00],
            ['name' => 'Pedicure', 'description' => 'Foot care treatment', 'price' => 25.00],
            ['name' => 'Hair Treatment', 'description' => 'Special hair treatment', 'price' => 35.00],
        ];

        foreach($services as $service){
            Service::updateOrCreate(['name'=>$service['name']],$service);
        }
    }
}
