<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FactureSeeder extends Seeder
{
    public function run()
    {
        DB::table('facture')->insert([
            [
                'n_ordre' => 'ORD-10001',
                'username' => 'user1',
                'ref_client' => 1, // Assuming a client with ref = 1
                'ref_prix_ciment' => 1, // Assuming a prix_ciment with ref = 1
                'prix_ciment_cl' => 15.5,
                'montant' => 300.0,
                'mode_regle' => 'Chèque',
                'prixtotal' => 450.0,
                'reste' => 150.0,
                'quant_kg' => 300,
                'quant_tonne' => 0.3,
                'quant_sacs' => 20,
                'date' => '2025-01-01',
                'observation' => 'Payment for cement delivery',
                'created_by' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'n_ordre' => 'ORD-10002',
                'username' => 'user2',
                'ref_client' => 2, // Assuming a client with ref = 2
                'ref_prix_ciment' => 2, // Assuming a prix_ciment with ref = 2
                'prix_ciment_cl' => 18.0,
                'montant' => 500.0,
                'mode_regle' => 'Espèce',
                'prixtotal' => 600.0,
                'reste' => 100.0,
                'quant_kg' => 500,
                'quant_tonne' => 0.5,
                'quant_sacs' => 30,
                'date' => '2025-01-02',
                'observation' => 'Payment for additional cement delivery',
                'created_by' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more entries if needed
        ]);
    }
}

