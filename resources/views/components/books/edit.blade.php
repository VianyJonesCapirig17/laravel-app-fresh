<x-layout title="Edit Book">
    <div class="max-w-4xl mx-auto px-6 py-8">
        <div class="mb-8 flex items-center justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">Edit Book</h1>
                <p class="text-slate-600 mt-1">Update the details for this book.</p>
            </div>
            <a href="{{ route('books.index') }}" class="rounded-lg bg-slate-900 px-4 py-3 text-sm font-semibold text-white hover:bg-slate-800">Back to List</a>
        </div>

        <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
            <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PATCH')
                @include('books._form')
                <div class="flex items-center gap-3 pt-2">
                    <button type="submit" class="rounded-lg bg-amber-500 px-5 py-3 text-sm font-semibold text-white hover:bg-amber-600">Update Book</button>
                    <a href="{{ route('books.show', $book) }}" class="text-sm font-semibold text-slate-600 hover:text-slate-900">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-layout>
