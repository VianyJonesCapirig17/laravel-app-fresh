<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Ideas;
use App\Models\Users;
use Illuminate\Http\Request;


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

Route::get('/user_registration', function(){
    $posts = Post::all();

    return view('user_registration',[
        'posts' => $posts,
    ]);
});

Route::post('/user_registration', function(){
    Post::create([
        'description' => request('description'),
    ]);

    return redirect('/user_registration');
});

Route::delete('/user_registration/{id}', function ($id) {
    Post::findOrFail($id)->delete();

    return redirect('/user_registration');
});

Route::get('/delete', function(){
    Post::truncate();  

    return redirect('/user_registration');
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
