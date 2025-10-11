<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Client;
use Illuminate\Http\Request;

class GestionController extends Controller
{
    public function index(request $request)
{
    $search=$request->get('search');
    $paginatselect=$request->get('paginatselect' ,'5');
    
    if($search){
        $factures = Facture::whereHas('client',function ($query) use ($search){
            $query->where('nom','like','%'.$search.'%');})->paginate($paginatselect); 
    }else{
            $factures = Facture::paginate($paginatselect);
            
    }
    $clients = Client::all();

    $totalSacs = $factures->sum('quant_sacs');
    $totalMontant = $factures->sum('prixtotal'); 
    $totalReste = $factures->sum('reste'); 

    if($request->ajax()){
        return view('partials.gestion_table', compact('factures', 'totalSacs', 'totalMontant', 'totalReste','clients','search','paginatselect'));
    }
    return view('gestion', compact('factures', 'totalSacs', 'totalMontant', 'totalReste','clients','search','paginatselect'));
}
}
