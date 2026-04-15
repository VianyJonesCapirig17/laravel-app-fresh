<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('user_registration.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user_registration.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    User::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'middle_name' => $request->middle_name,
        'nickname' => $request->nickname,
        'age' => $request->age,
        'address' => $request->address,
        'contact_number' => $request->contact_number,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    return redirect('/register');
}

    /**
     * Display the specified resource.
     */
    public function show(User $user)
{
    return view('user_registration.show', [
        'user' => $user,
    ]);
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
{
    $user->update([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'middle_name' => $request->middle_name,
        'nickname' => $request->nickname,
        'age' => $request->age,
        'address' => $request->address,
        'contact_number' => $request->contact_number,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    return redirect('/register');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
{
    $user->delete();

    return redirect('/register');
}
}
