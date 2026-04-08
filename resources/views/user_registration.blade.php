<x-layout>
    <x-slot:title>User Registration</x-slot:title>

    <div class="max-w-2xl mx-auto mt-10 p-8 bg-white/5 border border-white/10 rounded-xl shadow-lg">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-white mb-6">
                Create Account
            </h2>
            <a href="/display_users" class="px-4 py-2 bg-indigo-900 hover:bg-indigo-800 text-white text-sm font-semibold rounded-lg transition">
                View User List
            </a>
        </div>

        @if(session('success'))
        <div class="mb-6 p-4 bg-green-500/20 border border-green-500 text-green-200 rounded-lg flex items-center shadow-lg">
            <svg class="w-5 h-5 mr-3 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        <span>{{ session('success') }}</span>
        </div>
        @endif
        <form action="/register" method="POST" class="space-y-4">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-400 uppercase">
                        First Name
                    </label>
                    <input type="text" name="firstname" value="{{ old('firstname') }}" class="w-full mt-1 p-2 bg-white/10 border border-white/20 rounded text-white focus:border-indigo-500 outline-none">
                    @error('firstname') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-400 uppercase">
                        Middle Name
                    </label>
                    <input type="text" name="middlename" value="{{ old('middlename') }}" class="w-full mt-1 p-2 bg-white/10 border border-white/20 rounded text-white focus:border-indigo-500 outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-400 uppercase">
                        Last Name
                    </label>
                    <input type="text" name="lastname" value="{{ old('lastname') }}" class="w-full mt-1 p-2 bg-white/10 border border-white/20 rounded text-white focus:border-indigo-500 outline-none">
                    @error('lastname') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-400 uppercase">
                        Email
                    </label>
                    <input type="email" name="email" value="{{ old('email') }}" class="w-full mt-1 p-2 bg-white/10 border border-white/20 rounded text-white focus:border-indigo-500 outline-none">
                    @error('email') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-400 uppercase">
                        Nickname
                    </label>
                    <input type="text" name="nickname" value="{{ old('nickname') }}" class="w-full mt-1 p-2 bg-white/10 border border-white/20 rounded text-white focus:border-indigo-500 outline-none">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-400 uppercase">
                        Age
                    </label>
                    <input type="number" name="age" value="{{ old('age') }}" class="w-full mt-1 p-2 bg-white/10 border border-white/20 rounded text-white focus:border-indigo-500 outline-none">
                    @error('age') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-400 uppercase">
                        Contact Number
                    </label>
                    <input type="text" name="contact_number" value="{{ old('contact_number') }}" class="w-full mt-1 p-2 bg-white/10 border border-white/20 rounded text-white focus:border-indigo-500 outline-none">
                    @error('contact_number') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-400 uppercase">
                    Address
                </label>
                <textarea name="address" rows="2" class="w-full mt-1 p-2 bg-white/10 border border-white/20 rounded text-white focus:border-indigo-500 outline-none">{{ old('address') }}</textarea>
                @error('address') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-400 uppercase">
                    Password
                </label>
                <input type="password" name="password" class="w-full mt-1 p-2 bg-white/10 border border-white/20 rounded text-white focus:border-indigo-500 outline-none">
                @error('password') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="w-full py-3 mt-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-lg transition duration-200">
                Register User
            </button>
        </form>
    </div>
</x-layout>