<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

Route::view('/', 'welcome', [
    'greeting' => 'Hello, World!',
    'name' => 'John Doe',
    'age' => 30,
    'tasks' => [
        'Learn Laravel',
        'Build a project',
        'Deploy to production',
    ],
]);

Route::view('/about', 'about');
Route::view('/contact', 'contact');
Route::view('/user_registration', 'user_registration');

Route::get('/formtest', function(){
    $posts = Post::all();

    return view('formtest',[
        'posts' => $posts,
    ]);
});

Route::post('/formtest', function(){
    Post::create([
        'description' => request('description'),
    ]);

    return redirect('/formtest');
});

Route::delete('/formtest/{id}', function ($id) {
    Post::findOrFail($id)->delete();

    return redirect('/formtest');
});

Route::get('/delete', function(){
    Post::truncate();  

    return redirect('/formtest');
});


//index
Route::get('/posts', function(){
    $posts = Post::all();

    return view('posts.index', [
        'posts' => $posts,
    ]);
});

//show
Route::get('/posts/{post}', function (Post $post) {
    return view('posts.show', [
        'post' => $post,
    ]);
});

//edit
Route::get('/posts/{post}/edit', function (Post $post) {
    return view('posts.edit', [
        'post' => $post,
    ]);
}
);

//update
Route::patch('/posts/{post}', function (Post $post) {
    $post->update([
        'description' => request('description'),
        'updated_at' => now(),
    ]);

    return redirect('/posts' . '/' . $post->id);
}
);

Route::post('/register', function (Request $request) {
    // VALIDATION
    $incomingFields = $request->validate([
        'firstname'      => ['required', 'min:2', 'max:50'],
        'lastname'       => ['required', 'min:2', 'max:50'],
        'middlename'     => ['nullable'], // Optional field
        'nickname'       => ['nullable'],
        'email'          => ['required', 'email', 'unique:users,email'],
        'age'            => ['required', 'numeric', 'min:1', 'max:120'],
        'address'        => ['required', 'min:10'],
        'contact_number' => ['required'],
        'password'       => ['required', 'min:8']
    ]);

    // SAVE TO DATABASE
    // Note: Password hashing is handled automatically by the 'hashed' cast in User.php
    User::create($incomingFields);

    // REDIRECT WITH SUCCESS MESSAGE
    return redirect('/user_registration')->with('success', 'User registered successfully to the database!');
});

Route::get('/users', function () {
    // Fetch all users from the database
    $users = User::all(); 

    return view('display_users', ['users' => $users]);
});

Route::delete('/users/{id}', function ($id) {
    // Find the user by ID or fail with a 404 error
    $user = User::findOrFail($id);
    
    // Delete the user from the table
    $user->delete();

    // Go back to the list with a success message
    return redirect('/users')->with('success', 'User removed successfully.');
});
Route::get('/display_users', function () {
    return view('display_users', ['users' => \App\Models\User::all()]);
});

// Show the Edit Form
Route::get('/users/{id}/edit', function ($id) {
    $user = User::findOrFail($id);
    return view('edit_user', ['user' => $user]);
});

// Process the Update
Route::patch('/users/{id}', function (Request $request, $id) {
    $user = User::findOrFail($id);

    $validatedData = $request->validate([
        'firstname'      => ['required', 'min:2'],
        'lastname'       => ['required', 'min:2'],
        'nickname'       => ['nullable'],
        'age'            => ['required', 'numeric', 'min:1', 'max:120'], // Added Age validation
        'contact_number' => ['required'],
        'address'        => ['required', 'min:5'],
    ]);

    $user->update($validatedData);

    return redirect('/users')->with('success', 'User updated successfully!');
});