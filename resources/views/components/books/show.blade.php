<x-layout title="Book Details">
    <div class="max-w-5xl mx-auto px-6 py-8">
        <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">{{ $book->title }}</h1>
                <p class="text-slate-600 mt-1">Author: <span class="font-semibold text-slate-900">{{ $book->author }}</span></p>
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('books.edit', $book) }}" class="rounded-lg bg-amber-500 px-4 py-3 text-sm font-semibold text-white hover:bg-amber-600">Edit</a>
                <a href="{{ route('books.index') }}" class="rounded-lg border border-slate-300 px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-100">Back to List</a>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-4 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-900">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid gap-6 xl:grid-cols-[320px_1fr]">
            @if($book->cover_image)
                <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-sm">
                    <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Cover image" class="h-full w-full rounded-2xl object-cover" />
                </div>
            @endif

            <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
                <div class="grid gap-4">
                    <div class="space-y-2">
                        <h2 class="text-lg font-semibold text-slate-900">Description</h2>
                        <p class="text-slate-700">{{ $book->description }}</p>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div class="rounded-2xl bg-slate-50 p-4">
                            <p class="text-sm text-slate-500">Genre</p>
                            <p class="mt-1 font-semibold text-slate-900">{{ $book->genre }}</p>
                        </div>
                        <div class="rounded-2xl bg-slate-50 p-4">
                            <p class="text-sm text-slate-500">Published Year</p>
                            <p class="mt-1 font-semibold text-slate-900">{{ $book->published_year }}</p>
                        </div>
                        <div class="rounded-2xl bg-slate-50 p-4">
                            <p class="text-sm text-slate-500">ISBN</p>
                            <p class="mt-1 font-semibold text-slate-900">{{ $book->isbn }}</p>
                        </div>
                        <div class="rounded-2xl bg-slate-50 p-4">
                            <p class="text-sm text-slate-500">Pages</p>
                            <p class="mt-1 font-semibold text-slate-900">{{ $book->pages }}</p>
                        </div>
                        <div class="rounded-2xl bg-slate-50 p-4">
                            <p class="text-sm text-slate-500">Publisher</p>
                            <p class="mt-1 font-semibold text-slate-900">{{ $book->publisher }}</p>
                        </div>
                        <div class="rounded-2xl bg-slate-50 p-4">
                            <p class="text-sm text-slate-500">Language</p>
                            <p class="mt-1 font-semibold text-slate-900">{{ $book->language }}</p>
                        </div>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div class="rounded-2xl bg-slate-50 p-4">
                            <p class="text-sm text-slate-500">Price</p>
                            <p class="mt-1 font-semibold text-slate-900">₱{{ number_format($book->price, 2) }}</p>
                        </div>
                        <div class="rounded-2xl bg-slate-50 p-4">
                            <p class="text-sm text-slate-500">Available</p>
                            <p class="mt-1 font-semibold text-slate-900">{{ $book->is_available ? 'Yes' : 'No' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
