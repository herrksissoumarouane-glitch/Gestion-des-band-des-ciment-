<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Dynamically create 10 users
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->userName(),
                'email' => $faker->unique()->safeEmail(),
                'password' => Hash::make('password'), // Default password for all users
            ]);
        }
    }
}
