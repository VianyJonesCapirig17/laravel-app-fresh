<div class="space-y-6">
    <div class="grid gap-6 md:grid-cols-2">
        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">Title</label>
            <input name="title" value="{{ old('title', $book->title) }}" class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:border-slate-900 focus:outline-none" />
            @error('title')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">Author</label>
            <input name="author" value="{{ old('author', $book->author) }}" class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:border-slate-900 focus:outline-none" />
            @error('author')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
        </div>
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold text-slate-700">Description</label>
        <textarea name="description" rows="5" class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:border-slate-900 focus:outline-none">{{ old('description', $book->description) }}</textarea>
        @error('description')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
    </div>

    <div class="grid gap-6 md:grid-cols-3">
        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">Genre</label>
            @php
                $genreOptions = collect($genres)->merge(['Fiction', 'Sci-Fi', 'Non-Fiction', 'Biography', 'Mystery'])->unique();
            @endphp
            <select name="genre" class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:border-slate-900 focus:outline-none">
                <option value="">Choose a genre</option>
                @foreach($genreOptions as $genreOption)
                    <option value="{{ $genreOption }}" {{ old('genre', $book->genre) === $genreOption ? 'selected' : '' }}>{{ $genreOption }}</option>
                @endforeach
            </select>
            @error('genre')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">Published Year</label>
            <input type="number" name="published_year" value="{{ old('published_year', $book->published_year) }}" class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:border-slate-900 focus:outline-none" />
            @error('published_year')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">ISBN</label>
            <input name="isbn" value="{{ old('isbn', $book->isbn) }}" class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:border-slate-900 focus:outline-none" />
            @error('isbn')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
        </div>
    </div>

    <div class="grid gap-6 md:grid-cols-3">
        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">Pages</label>
            <input type="number" name="pages" value="{{ old('pages', $book->pages) }}" class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:border-slate-900 focus:outline-none" />
            @error('pages')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">Language</label>
            <input name="language" value="{{ old('language', $book->language) }}" class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:border-slate-900 focus:outline-none" />
            @error('language')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">Publisher</label>
            <input name="publisher" value="{{ old('publisher', $book->publisher) }}" class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:border-slate-900 focus:outline-none" />
            @error('publisher')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
        </div>
    </div>

    <div class="grid gap-6 md:grid-cols-3">
        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">Price</label>
            <input type="number" step="0.01" name="price" value="{{ old('price', $book->price) }}" class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:border-slate-900 focus:outline-none" />
            @error('price')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
        </div>

        <div class="flex items-center gap-3 pt-6">
            <input type="hidden" name="is_available" value="0" />
            <input type="checkbox" name="is_available" value="1" {{ old('is_available', $book->is_available) ? 'checked' : '' }} class="h-4 w-4 rounded border-slate-300 text-slate-900 focus:ring-slate-900" />
            <label class="text-sm font-medium text-slate-700">Available</label>
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-slate-700">Cover Image</label>
            <input type="file" name="cover_image" accept="image/*" class="block w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm text-slate-700 focus:border-slate-900 focus:outline-none" />
            @error('cover_image')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror

            @if($book->cover_image)
                <div class="mt-3 rounded-xl border border-slate-200 bg-slate-50 p-3 text-sm text-slate-700">
                    <p class="font-medium text-slate-800">Current image</p>
                    <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Cover image" class="mt-3 max-h-40 rounded-lg object-cover" />
                </div>
            @endif
        </div>
    </div>
</div>
