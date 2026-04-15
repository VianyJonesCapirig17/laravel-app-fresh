<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->query('search');
        $genre = $request->query('genre');

        $query = Book::query();

        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('author', 'like', "%{$search}%");
            });
        }

        if ($genre) {
            $query->where('genre', $genre);
        }

        $books = $query->orderBy('title')->paginate(10)->withQueryString();
        $genres = Book::query()->select('genre')->distinct()->orderBy('genre')->pluck('genre');

        return view('components.books.index', compact('books', 'search', 'genre', 'genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $genres = Book::query()->select('genre')->distinct()->orderBy('genre')->pluck('genre');

        return view('components.books.create', [
            'book' => new Book(),
            'genres' => $genres,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $attributes = $this->validateBook($request);

        if ($request->hasFile('cover_image')) {
            $attributes['cover_image'] = $request->file('cover_image')->store('books/covers', 'public');
        }

        Book::create($attributes);

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
        $genres = Book::query()->select('genre')->distinct()->orderBy('genre')->pluck('genre');

        return view('books.edit', compact('book', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
        $attributes = $this->validateBook($request, $book);

        if ($request->hasFile('cover_image')) {
            if ($book->cover_image) {
                Storage::disk('public')->delete($book->cover_image);
            }

            $attributes['cover_image'] = $request->file('cover_image')->store('books/covers', 'public');
        }

        $book->update($attributes);

        return redirect()->route('books.show', $book)->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
        if ($book->cover_image) {
            Storage::disk('public')->delete($book->cover_image);
        }

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
    protected function validateBook(Request $request, Book $book = null): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'genre' => ['required', 'string', 'max:255'],
            'published_year' => ['required', 'integer', 'digits:4'],
            'isbn' => [
                'required',
                'string',
                'max:255',
                Rule::unique('books', 'isbn')->ignore($book?->id),
            ],
            'pages' => ['required', 'integer', 'min:1'],
            'language' => ['required', 'string', 'max:255'],
            'publisher' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'cover_image' => ['sometimes', 'nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
            'is_available' => ['sometimes', 'boolean'],
        ]);
    }
}
