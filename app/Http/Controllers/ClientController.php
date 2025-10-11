<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\CimentType;
use App\Models\PrixCimentClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ClientController extends Controller
{
    public function index(Request $request)
{
    $perPage = $request->get('perPage', 5);
    $search = $request->get('search');
    
    if ($search) {
        $clients = Client::where('nom', 'like', $search . '%')
                         ->withCount('cimentTypes')
                         ->paginate(5);
    } else { 
        $clients = Client::withCount('cimentTypes')->paginate($perPage);
    }
    if ($request->ajax()) {
        return view('partials.client-list', compact('clients'));
    }
    return view('client', compact('clients','perPage'));
}
    
  
    public function create( )
    {  
        return view('create');
    }
    public function store( request $request ){
        $request->validate([
            'nom' => 'required|string|max:200',//|unique:clients
            'created_by' => 'required|string|max:100',
            'updated_by' => 'nullable|string|max:100', 
        ]);
        Client::create([
            'nom' => $request->nom,
            'created_by' => $request->created_by,
            'updated_by' => $request->updated_by,
        ]);
        
        return redirect()->route('index')->with('success','');
    }
    
    public function delete($ref)
{   
    Client::findOrFail($ref)->delete();
    return redirect()->route('index')->with('success','');
    
}
    public function show($ref)
{   
    $client=Client::findOrFail($ref);
      
    return view('show',compact('client'))->with('success','');
    
}
public function update($ref)
{   
    $client=Client::findOrFail($ref);
      
    return view('update',compact('client'))->with('success','');
    
}
///////////////////////////
public function doupdate(Request $request, $ref)
{
    $validatedData = $request->validate([
        'clientName' => 'required|string|max:255',
        'createdBy' => 'required|string|max:255',
        'updatedBy' => 'required|string|max:255',
        'updatedAt' => 'required|date',
    ]);

    $client = Client::findOrFail($ref);

    $client->nom = $validatedData['clientName'];
    $client->created_by = $validatedData['createdBy'];
    $client->updated_by = $validatedData['updatedBy'];
    $client->updated_at = $validatedData['updatedAt'];

    $client->save();

    return redirect()
        ->route('index') 
        ->with('success', 'Client information updated successfully!');
}

////////////////////////
public function add($ref)
{   
    $client=Client::findOrFail($ref);
    $CimentType=CimentType::all();
    return view('add',compact(['client','CimentType'])) ;
    
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function store2(Request $request)
{
    $validatedData = $request->validate([
        'clientName' => 'required|string|max:255',   
        'CimentType' => 'required|integer|exists:ciment_type,ref',//check the value of ciment type is i=exist
        'price' => 'required|numeric|min:0',
    ]);
    $client = Client::where('nom', $validatedData['clientName'])->first();
/////////////////////////////////////    
    if (!$client) {
        return redirect()->back()->withErrors(['clientName' => 'Client not found.']);
    }

    $oldprice = PrixCimentClient::where('ref_client', $client->ref)
        ->where('ref_cimenttype', $validatedData['CimentType'])
        ->first();

    if ($oldprice) {
        return redirect()->back()->withErrors(['CimentType' => 'This cement type is already assigned to the client.']);
    }
//////////////////////////////////// 
    
    $newprice = new PrixCimentClient();
    $newprice->ref_client = $client->ref;
    $newprice->ref_cimenttype = $validatedData['CimentType'];
    $newprice->prix = $validatedData['price'];
    $newprice->save();

    return redirect()->route('index')->with('success', 'Tarif ajouté avec succès.');
}







}
