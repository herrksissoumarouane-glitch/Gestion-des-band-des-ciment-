<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // Use DB facade to insert 100 records directly into the 'client' table
        $data = [];
        foreach (range(1, 100) as $index) {
            $data[] = [
                'nom' => $faker->company,
                'created_by' => $faker->name,
                'updated_by' => $faker->optional()->name,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ];
        }

        // Insert all data at once for better performance
        DB::table('clients')->insert($data);
    }
}
