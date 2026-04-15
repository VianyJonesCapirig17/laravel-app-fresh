<x-layout title="Create Book">
    <div class="max-w-4xl mx-auto px-6 py-8">
        <div class="mb-8 flex items-center justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">Add New Book</h1>
                <p class="text-slate-600 mt-1">Fill in the book details and save it to the library.</p>
            </div>
            <a href="{{ route('books.index') }}" class="rounded-lg bg-slate-900 px-4 py-3 text-sm font-semibold text-white hover:bg-slate-800">Back to List</a>
        </div>

        <div class="rounded-3xl border border-slate-200 p-8 shadow-sm">
            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @include('components.books.form')
                <div class="flex items-center gap-3 pt-2">
                    <button type="submit" class="rounded-lg bg-slate-900 px-5 py-3 text-sm font-semibold text-white hover:bg-slate-800">Save Book</button>
                    <a href="{{ route('books.index') }}" class="text-sm font-semibold text-slate-600 hover:text-slate-900">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-layout>
