<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\CimentType;
use App\Models\Facture;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use \PDF;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Log;

class FactureController extends Controller
{
    use HasFactory, SoftDeletes;
    
    public function index(Request $request)
{
    $paginate = $request->get('paginate', 5);
    $user = auth()->user();   
    
     
    if ($user->role == '3') {
        $factures = Facture::where('created_by', $user->name)->paginate($paginate);
    } else {
         
        $factures = Facture::with('client')->paginate($paginate);
    }

    return view("facture", compact("factures", 'paginate'));
}



    public function create()
    {
        $clients = Client::all();
        $ciments = CimentType::all();
        $paymentMethods = ['Chèque', 'Espèce'];
        return view("createf", compact(['clients', 'ciments', 'paymentMethods']));
    }

    public function store(Request $request)
    { 
        $validated = $request->validate([
            'n_ordre' => 'required|string|max:12',
            'client' => 'required|exists:clients,ref',
            'ciment' => 'required|exists:ciment_type,ref',
            'paymentMode' => 'required|string',
            'prix_ciment_cl' => 'required|numeric',
            'quant_kg' => 'required|numeric',
            'prixtotal' => 'required|numeric',
            'reste' => 'required|numeric',
            'quant_sacs' => 'required|numeric',
            'quant_tonne' => 'required|numeric',
            'montant' => 'required|numeric',
            'date' => 'required|date',
            'observation' => 'nullable|string',
        ]);
    
        try { 
            $facture = new Facture();
            $facture->n_ordre = $validated['n_ordre'];
            $facture->username = auth()->user()->name;
            $facture->ref_client = $validated['client'];
            $facture->ref_prix_ciment = $validated['ciment'];
            $facture->mode_regle = $validated['paymentMode'];
            $facture->prix_ciment_cl = $validated['prix_ciment_cl'];
            $facture->montant = $validated['montant'];
            $facture->prixtotal = $validated['prixtotal'];
            $facture->reste = $validated['reste'];
            $facture->quant_kg = $validated['quant_kg'];
            $facture->quant_tonne = $validated['quant_tonne'];
            $facture->quant_sacs = $validated['quant_sacs'];
            $facture->date = $validated['date'];
            $facture->observation = $validated['observation'];
            $facture->created_by = auth()->user()->name;
            $facture->save();
     
            return redirect()->route('facture')->with('success', 'Facture ajoutée avec succès');
        } catch (\Exception $e) { 
            Log::error('Error saving facture: ' . $e->getMessage());
            return back()->with('error', 'Erreur lors de l\'ajout de la facture: ' . $e->getMessage());
        }
    }
    
    public function getCiMentPrice(Request $request)
    {
        $clientRef = $request->input('client_ref');
        $cimentRef = $request->input('ciment_ref');

        $clientCimentPrice = DB::table('prix_ciment_client')
                                ->where('ref_client', $clientRef)
                                ->where('ref_cimenttype', $cimentRef)
                                ->first();

        if ($clientCimentPrice) {
            return response()->json([ 'price' => $clientCimentPrice->prix ]);
        }

        $cement = CimentType::where('ref', $cimentRef)->first();

        if ($cement) {
            return response()->json([ 'price' => $cement->prix ]);
        }

        return response()->json([ 'price' => 0 ]);
    }

    public function print($ref)
    { 
        $facture = Facture::with('client')->where('ref', $ref)->first();

        if (!$facture) {
            return redirect()->back()->withErrors('Facture not found.');
        }

        
        $pdf = PDF::loadView('facture.print', compact('facture'));
 
        return $pdf->download('facture_' . $facture->ref . '.pdf');
    }

    public function destroy($ref)
    {
        $facture = Facture::findOrFail('ref');
        $facture->delete();
        return redirect()->route('facture')->with('success', 'Facture deleted successfully.');
    }
    public function update($ref)
    {
        $facture = Facture::where('ref', $ref)->firstOrFail();
 
        return view('updatefacture', compact('facture'));
    }
    public function update2(Request $request, $ref)
{ 
    $validatedData = $request->validate([
        'n_ordre' => 'required|string|max:12',
        'username' => 'required|string|max:11',
        'ref_client' => 'required|exists:client,ref',
        'ref_prix_ciment' => 'required|exists:prix_ciment_client,ref',
        'prix_ciment_cl' => 'required|numeric',
        'montant' => 'required|numeric',
        'mode_regle' => 'required|in:Chèque,Espèce',
        'prixtotal' => 'required|numeric',
        'reste' => 'required|numeric',
        'quant_kg' => 'required|numeric',
        'quant_tonne' => 'required|numeric',
        'quant_sacs' => 'required|integer',
        'date' => 'required|date',
        'observation' => 'nullable|string',
    ]);
 
    $facture = Facture::findOrFail($ref);
 
    $facture->update($validatedData);
 
    return redirect()->route('facture', $ref)
        ->with('success', 'Facture updated successfully.');
}



    
    public function show($ref)
{ 
    $facture = Facture::where('ref', $ref)->firstOrFail();
 
    return view('showfacture', compact('facture'));
}


  
}
