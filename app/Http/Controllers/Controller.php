<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index() 
    {
        $users = User::all();
        return view('user_registration', compact('users'));
    }

 
    public function store(Request $request) 
    {
        $request->validate([
            'first_name'     => 'required|string|max:255',
            'last_name'      => 'required|string|max:255',
            'email'          => 'required|email|unique:users,email',
            'age'            => 'required|numeric',
            'address'        => 'required|string',
            'contact_number' => 'required|string',
        ]);

        User::create($request->all());

        return back()->with('success', 'User registered successfully!');
    }

    
    public function edit(User $user) 
    {
        return view('edit_user', compact('user'));
    }


    public function update(Request $request, User $user) 
    {
        $request->validate([
            'first_name'     => 'required|string|max:255',
            'last_name'      => 'required|string|max:255',
            'email'          => 'required|email|unique:users,email,' . $user->id,
            'age'            => 'required|numeric',
            'address'        => 'required|string',
            'contact_number' => 'required|string',
        ]);

        $user->update($request->all());

        return redirect('/user_registration')->with('success', 'User updated successfully!');
    }

    // 6. Delete Function - Removes a user from the database
    public function destroy(User $user) 
    {
        $user->delete();
        return back()->with('success', 'User deleted successfully!');
    }
}