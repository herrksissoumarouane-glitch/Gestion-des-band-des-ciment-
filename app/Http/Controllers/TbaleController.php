<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CimentType;
use App\Models\Facture;
class TbaleController extends Controller
{
    public function index()
    {
         
        $factures = Facture::with('cimentType')
            ->selectRaw('ref_prix_ciment, sum(prix_ciment_cl) as total_prix, sum(quant_sacs) as total_sacs')
            ->groupBy('ref_prix_ciment')
            ->get(); 

        return view('table', compact('factures'));
    }
 
}
