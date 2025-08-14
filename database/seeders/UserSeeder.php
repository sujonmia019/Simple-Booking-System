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
        User::updateOrCreate(['email'=>'admin@gmail.com'],['role_name'=>'admin','full_name'=>'Sujon MIa','phone_number'=>'01743776488','password'=>12345678]);

        // Customer Users
        User::updateOrCreate(['email'=>'customer1@gmail.com'],['role_name'=>'customer','full_name'=>'Sujon Mia','phone_number'=>'01602603147','password'=>12345678]);
        User::updateOrCreate(['email'=>'customer2@gmail.com'],['role_name'=>'customer','full_name'=>'Demo','phone_number'=>'01872339806','password'=>12345678]);
    }
}
