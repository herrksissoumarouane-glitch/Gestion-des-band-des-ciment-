<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PrixCimentClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prix_ciment_client')->insert([
            ['ref_client' => 1, 'ref_cimenttype' => 1, 'prix' => 150.00, 'created_by' => 'Admin', 'updated_by' => 'Admin'],
            ['ref_client' => 2, 'ref_cimenttype' => 2, 'prix' => 200.00, 'created_by' => 'Admin', 'updated_by' => 'Admin'],
            ['ref_client' => 3, 'ref_cimenttype' => 3, 'prix' => 175.00, 'created_by' => 'Admin', 'updated_by' => 'Admin'],
            ['ref_client' => 4, 'ref_cimenttype' => 4, 'prix' => 250.00, 'created_by' => 'Admin', 'updated_by' => 'Admin'],
            ['ref_client' => 5, 'ref_cimenttype' => 5, 'prix' => 180.00, 'created_by' => 'Admin', 'updated_by' => 'Admin'],
            ['ref_client' => 6, 'ref_cimenttype' => 6, 'prix' => 220.00, 'created_by' => 'Admin', 'updated_by' => 'Admin'],
            ['ref_client' => 7, 'ref_cimenttype' => 7, 'prix' => 210.00, 'created_by' => 'Admin', 'updated_by' => 'Admin'],
        ]);
    }
}
