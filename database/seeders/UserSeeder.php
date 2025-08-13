<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin User
        User::updateOrCreate(['email'=>'admin@gmail.com'],['role_name'=>'admin','full_name'=>'Admin','phone_number'=>'01743776488','password'=>12345678]);

        // Customer User
        User::updateOrCreate(['email'=>'customer@gmail.com'],['role_name'=>'customer','full_name'=>'Customer','phone_number'=>'01602603147','password'=>12345678]);
    }
}
