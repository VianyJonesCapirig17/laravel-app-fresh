<x-layout>
    <div class="max-w-2xl mx-auto bg-white/5 border border-white/10 p-8 rounded-2xl backdrop-blur-md">
        <h2 class="text-2xl font-bold text-white mb-6">Edit User: {{ $user->firstname }}</h2>

        <form action="/users/{{ $user->id }}" method="POST">
            @csrf
            @method('PATCH') {{-- Important for Updates --}}

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs text-gray-400 uppercase font-bold mb-1">
                        First Name
                    </label>
                    <input type="text" name="firstname" value="{{ $user->firstname }}" 
                    class="w-full bg-white/5 border border-white/10 rounded-lg p-3 text-white">
                </div>
                <div>
                    <label class="block text-xs text-gray-400 uppercase font-bold mb-1">
                        Last Name
                    </label>
                    <input type="text" name="lastname" value="{{ $user->lastname }}" 
                    class="w-full bg-white/5 border border-white/10 rounded-lg p-3 text-white">
                </div>
                <div class="mt-4">
                    <label class="block text-xs text-gray-400 uppercase font-bold mb-1">
                        Nickname
                    </label>
                    <input type="text" name="nickname" value="{{ $user->nickname }}" 
                    class="w-full bg-white/5 border border-white/10 rounded-lg p-3 text-white focus:border-indigo-500 transition">
                </div>
                <div class="mt-4">
                    <label class="block text-xs text-gray-400 uppercase font-bold mb-1">
                        Age
                    </label>
                    <input type="number" name="age" value="{{ $user->age }}" 
                    class="w-full bg-white/5 border border-white/10 rounded-lg p-3 text-white focus:border-indigo-500 transition"min="1" max="120">
                </div>
                <div>
                    <label class="block text-xs text-gray-400 uppercase font-bold mb-1">
                        Contact Number
                    </label>
                    <input type="text" name="contact_number" value="{{ $user->contact_number }}" 
                        class="w-full bg-white/5 border border-white/10 rounded-lg p-3 text-white focus:border-indigo-500 transition">
                </div>
                <div>
                    <label class="block text-xs text-gray-400 uppercase font-bold mb-1">
                        Address
                    </label>
                    <input type="text" name="address" value="{{ $user->address }}" 
                        class="w-full bg-white/5 border border-white/10 rounded-lg p-3 text-white focus:border-indigo-500 transition">
                </div>
            </div>

            <div class="flex gap-4 mt-8">
                <button type="submit" class="flex-1 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-lg transition">
                    Update User
                </button>
                <a href="/users" class="flex-1 py-3 bg-white/5 text-center text-white font-bold rounded-lg border border-white/10">
                    Cancel
                </a>
            </div>
            
        </form>
    </div>
</x-layout>