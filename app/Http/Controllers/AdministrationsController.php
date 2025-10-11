<?php

namespace App\Http\Controllers;
use App\Http\Controllers\NotificationController;

use Illuminate\Http\Request;use Illuminate\Support\Facades\Hash;
use App\Models\User; 
use App\Models; 
class AdministrationsController extends Controller
{
        public function index(request $request){ 
            $search=$request->get('search');
            $paginate=$request->get('paginate',5);

            if($search){
                $admins=User::where('name','like','%'.$search.'%')->paginate($paginate);
            }else{
                $admins=User::paginate($paginate);
            }

            

            if($request->ajax()){
                return view('partials.administrations_table',compact('admins') );
            }

            return view('administrations',compact('admins') );
    
        }


    public function reload($id)
{  
    $admin = User::find($id);

    if ($admin) { 
        $admin->password = Hash::make($admin->name);   
        $admin->save();  

        return redirect('administrations')->with('success','');
    }

    return response()->json(['message' => 'User not found!'], 404);
}
public function create()
    {
        return view('newadmin');  
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:1,2,3',
        ]);

        $admin = new User();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);  
        $admin->role = $request->role;
        $admin->save();
         

        return redirect()->route('administrations')->with('status', 'Admin created successfully!');
    }
}
