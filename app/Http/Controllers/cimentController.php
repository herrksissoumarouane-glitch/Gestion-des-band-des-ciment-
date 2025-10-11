<?php

namespace App\Http\Controllers;
use App\Models\CimentType;
use Illuminate\Http\Request;

class cimentController extends Controller
{
    //////////////////////////////////  //////////////////////////////////
    public function ciment(Request $request)
{
    $perPage = $request->get('perPage', 5);
    $search = $request->get('search');

    if ($search) { 
        $ciments = CimentType::where('nom', 'like', '%' . $search . '%')->paginate($perPage);
    } else { 
        $ciments = CimentType::paginate($perPage);
    }
 
    if ($request->ajax()) { 
        return view('partials.ciment_table', compact('ciments'));
    }
 
    return view('ciment', compact('ciments', 'perPage', 'search'));
}
  //////////////////////////////////  //////////////////////////////////

    public function create( )
    {  
        return view('addcat');
    }
    public function store(Request $request)
{ 
    $request->validate([
        'nom' => 'required|string|max:200',
    ]);
     
    CimentType::create([
        'nom' => $request->nom,
        'created_by' => auth()->id(),  
    ]);
    
    return redirect()->route('ciment')->with('success', 'Ciment Type created successfully');
}

    public function delete($ref)
{   
    CimentType::findOrFail($ref)->delete();
    $ciments = CimentType::All();
    return redirect()->route('ciment')->with('success','');
    
}
public function update($ref )
{  $ciment=CimentType::findOrFail($ref);
    return view('update2',compact('ciment'));
}
public function update2(Request $request, $ref)
{
    $request->validate([
        'nom' => 'required|string|max:255',
    ]);

    $ciment = CimentType::findOrFail($ref);
    $ciment->nom = $request->input('nom');
    $ciment->save();

    return redirect()->route('ciment')->with('success', 'Catégorie mise à jour avec succès!');
}

}
