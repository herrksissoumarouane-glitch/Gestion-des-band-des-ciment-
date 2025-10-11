<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory as Faker;

class TypeSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $numEntries = 5; // You can change this to insert any number of records

        foreach (range(1, $numEntries) as $index) {
            DB::table('ciment_type')->insert([
                'nom' => $faker->word,  // Generate random name
                'created_by' => $faker->name,  // Random name for created_by
                'updated_by' => $faker->name,  // Random name for updated_by
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ]);
        }
    }
}
