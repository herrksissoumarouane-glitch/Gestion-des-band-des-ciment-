<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    } 
//     public function create(Request $request): View
//     {   

//         return view('create' );
//     }
 
// public function store(Request $request)
// {
//     // Validate the incoming request data
//     $validatedData = $request->validate([
//         'name' => 'required|string|max:11|unique:users',
//         'email' => 'required|email|max:250|unique:users',
//         'prenom' => 'required|string|max:150',
//         'token' => 'nullable|string|max:250',
//         'remember_token' => 'nullable|string|max:250',
//         'role' => 'required|in:1,2,3',
//         'actif' => 'required|in:0,1',
//         'notif_vu' => 'required|in:vu,nov',
//         'created_by' => 'required|string|max:100',
//         'updated_by' => 'nullable|string|max:100',
//         'email_verified_at' => 'nullable|date',
//         'password' => 'required|string|min:8',
//     ]);

//     // Create the user
//     $user = User::create([
//         'name' => $validatedData['name'],
//         'email' => $validatedData['email'],
//         'prenom' => $validatedData['prenom'],
//         'token' => $validatedData['token'],
//         'remember_token' => $validatedData['remember_token'],
//         'role' => $validatedData['role'],
//         'actif' => $validatedData['actif'],
//         'notif_vu' => $validatedData['notif_vu'],
//         'created_by' => $validatedData['created_by'],
//         'updated_by' => $validatedData['updated_by'],
//         'email_verified_at' => $validatedData['email_verified_at'],
//         'password' => Hash::make($validatedData['password']), // Hash the password
//     ]);

//     // Redirect or return response
//     return redirect()->route('index')->with('success', 'User created successfully!');
// }

    

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
