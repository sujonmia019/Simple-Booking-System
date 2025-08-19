<?php

namespace Tests\Feature;

use Tests\TestCase;
use Database\Seeders\UserSeeder;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_seeded_users_exist(): void
    {
        $this->seed(UserSeeder::class);

        $this->assertDatabaseHas('users', [
            'role_name' => 'admin',
            'full_name' => 'Sujon MIa',
            'phone_number' => '01743776488',
        ]);

        $this->assertDatabaseHas('users', [
            'role_name' => 'customer',
            'full_name' => 'Sujon Mia',
            'phone_number' => '01602603147',
        ]);

        $this->assertDatabaseHas('users', [
            'role_name' => 'customer',
            'full_name' => 'Demo',
            'phone_number' => '01872339806',
        ]);
    }
}
