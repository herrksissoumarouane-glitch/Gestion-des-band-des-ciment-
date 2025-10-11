<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CimentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ciment_type')->insert([
            ['nom' => 'Type A', 'created_by' => 'Admin', 'updated_by' => 'Admin', 'created_at' => '2025-12-31', 'updated_at' => '2025-12-31'],
            ['nom' => 'Type B', 'created_by' => 'Admin', 'updated_by' => 'Admin', 'created_at' => '2025-12-31', 'updated_at' => '2025-12-31'],
            ['nom' => 'Type C', 'created_by' => 'Admin', 'updated_by' => 'Admin', 'created_at' => '2025-12-31', 'updated_at' => '2025-12-31'],
            ['nom' => 'Type D', 'created_by' => 'Admin', 'updated_by' => 'Admin', 'created_at' => '2025-12-31', 'updated_at' => '2025-12-31'],
            ['nom' => 'Type E', 'created_by' => 'Admin', 'updated_by' => 'Admin', 'created_at' => '2025-12-31', 'updated_at' => '2025-12-31'],
            ['nom' => 'Type F', 'created_by' => 'Admin', 'updated_by' => 'Admin', 'created_at' => '2025-12-31', 'updated_at' => '2025-12-31'],
            ['nom' => 'Type G', 'created_by' => 'Admin', 'updated_by' => 'Admin', 'created_at' => '2025-12-31', 'updated_at' => '2025-12-31'],
        ]);
    }
}
