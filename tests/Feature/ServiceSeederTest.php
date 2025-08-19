<?php

namespace Tests\Feature;

use Tests\TestCase;
use Database\Seeders\ServiceSeeder;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ServiceSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_seeded_services_exist(): void
    {
        $this->seed(ServiceSeeder::class);

        $services = [
            'Haircut', 'Hair Coloring', 'Shaving', 'Facial',
            'Massage', 'Manicure', 'Pedicure', 'Hair Treatment'
        ];

        foreach ($services as $serviceName) {
            $this->assertDatabaseHas('services', [
                'name' => $serviceName,
            ]);
        }
    }
}
