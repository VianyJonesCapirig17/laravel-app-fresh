<x-layout title="Books">
    <div class="max-w-7xl mx-auto px-6 py-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">Book Management</h1>
                <p class="text-slate-600 mt-1">Search by title or author, filter by genre, view and manage books.</p>
            </div>
            <a href="{{ route('books.create') }}" class="inline-flex items-center justify-center rounded-lg bg-slate-900 px-5 py-3 text-sm font-semibold text-white shadow hover:bg-slate-800">Add New Book</a>
        </div>

        @if(session('success'))
            <div class="mb-4 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-900">
                {{ session('success') }}
            </div>
        @endif

        <form method="GET" action="{{ route('books.index') }}" class="grid gap-4 md:grid-cols-3 mb-6">
            <input name="search" value="{{ $search }}" placeholder="Search title or author" class="rounded-lg border border-slate-300 px-4 py-3 focus:border-slate-900 focus:outline-none" />
            <select name="genre" class="rounded-lg border border-slate-300 px-4 py-3 focus:border-slate-900 focus:outline-none">
                <option value="">All genres</option>
                @foreach($genres as $genreOption)
                    <option value="{{ $genreOption }}" {{ $genreOption === $genre ? 'selected' : '' }}>{{ $genreOption }}</option>
                @endforeach
            </select>
            <button type="submit" class="rounded-lg bg-slate-900 px-4 py-3 text-white hover:bg-slate-800">Search</button>
        </form>

        @if($books->isEmpty())
            <div class="rounded-xl border border-slate-200 bg-slate-50 p-8 text-center text-slate-600">
                No books found. Start by adding a new book.
            </div>
        @else
            <div class="overflow-hidden rounded-xl border border-slate-200 shadow-sm">
                <table class="min-w-full divide-y divide-slate-200 bg-white">
                    <thead class="bg-slate-50 text-left text-sm font-semibold text-slate-700">
                        <tr>
                            <th class="px-6 py-4">Title</th>
                            <th class="px-6 py-4">Author</th>
                            <th class="px-6 py-4">Genre</th>
                            <th class="px-6 py-4">Price</th>
                            <th class="px-6 py-4">Availability</th>
                            <th class="px-6 py-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 text-sm text-slate-700">
                        @foreach($books as $book)
                            <tr class="hover:bg-slate-50">
                                <td class="px-6 py-4 font-medium text-slate-900">{{ $book->title }}</td>
                                <td class="px-6 py-4">{{ $book->author }}</td>
                                <td class="px-6 py-4">{{ $book->genre }}</td>
                                <td class="px-6 py-4">₱{{ number_format($book->price, 2) }}</td>
                                <td class="px-6 py-4">{{ $book->is_available ? 'Available' : 'Not available' }}</td>
                                <td class="px-6 py-4 space-x-2">
                                    <a href="{{ route('books.show', $book) }}" class="rounded-md bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-800 hover:bg-slate-200">View</a>
                                    <a href="{{ route('books.edit', $book) }}" class="rounded-md bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-900 hover:bg-amber-200">Edit</a>
                                    <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this book?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-md bg-rose-100 px-3 py-1 text-xs font-semibold text-rose-900 hover:bg-rose-200">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $books->links() }}
            </div>
        @endif
    </div>
</x-layout>
