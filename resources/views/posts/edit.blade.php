<x-layout>
    <style>
        @keyframes gradientFlow {
            0%   { background-position: 0% 50%; }
            50%  { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .animate-mesh {
            background: linear-gradient(-45deg, #741a1a, #1e1b4b, #ac3636, #020617);
            background-size: 400% 400%;
            animation: gradientFlow 10s ease infinite;
        }
        .glass-card {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .input-field {
            display: block; width: 100%; border-radius: 0.75rem;
            background: rgba(2, 6, 23, 0.5);
            border: 1px solid rgba(100, 116, 139, 0.5);
            color: white; padding: 0.625rem 1rem;
            font-size: 0.875rem; transition: all 0.2s;
        }
        .input-field::placeholder { color: rgba(100, 116, 139, 0.5); }
        .input-field:focus { outline: none; border-color: #f59e0b; box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.2); }
        .input-field.error { border-color: #f87171; }
        .label-style { display: block; font-size: 10px; font-weight: 700; color: #94a3b8; margin-bottom: 4px; margin-left: 4px; text-transform: uppercase; letter-spacing: 0.1em; }
        .error-msg { font-size: 11px; color: #f87171; margin-top: 4px; margin-left: 4px; }
    </style>

    <div class="min-h-screen animate-mesh py-12 px-4 flex items-center justify-center font-sans antialiased">
        <div class="max-w-3xl mx-auto w-full">
            <div class="glass-card rounded-3xl shadow-2xl overflow-hidden">

                {{-- Header --}}
                <div class="px-8 pt-8 pb-6 bg-gradient-to-b from-white/5 to-transparent">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="p-3 bg-amber-500/20 rounded-2xl ring-1 ring-amber-400/30">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-2xl font-bold text-white tracking-tight">Edit User</h1>
                                <p class="text-xs text-amber-300 uppercase tracking-widest font-bold opacity-70">
                                    Editing: {{ $user->first_name }} {{ $user->last_name }}
                                </p>
                            </div>
                        </div>
                        <a href="{{ route('users.index') }}"
                           class="flex items-center gap-1 text-xs text-slate-400 hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                            Back
                        </a>
                    </div>
                </div>

                {{-- TASK 7: Edit Form --}}
                <div class="px-8 pb-8">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <div>
                                <label class="label-style">First Name</label>
                                <input type="text" name="lastName"
                                       value="{{ old('lastName', $user->lastName) }}"
                                       class="input-field @error('lastName') error @enderror"
                                       required>
                                @error('firstName') <p class="error-msg">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="label-style">Last Name</label>
                                <input type="text" name="lastName"
                                       value="{{ old('lastName', $user->lastName) }}"
                                       class="input-field @error('lastName') error @enderror"
                                       required>
                                @error('lastName') <p class="error-msg">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="label-style">Middle Name <span class="normal-case text-slate-600">(optional)</span></label>
                                <input type="text" name="middleName"
                                       value="{{ old('nickname', $user->middleName) }}"
                                       class="input-field">
                                @error('middleName') <p class="error-msg">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="label-style">Nickname <span class="normal-case text-slate-600">(optional)</span></label>
                                <input type="text" name="nick_name"
                                       value="{{ old('nick_name', $user->nick_name) }}"
                                       class="input-field">
                                @error('nick_name') <p class="error-msg">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="label-style">Email Address</label>
                                <input type="email" name="email"
                                       value="{{ old('email', $user->email) }}"
                                       class="input-field @error('email') error @enderror"
                                       required>
                                @error('email') <p class="error-msg">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="label-style">Age</label>
                                <input type="number" name="age"
                                       value="{{ old('age', $user->age) }}"
                                       class="input-field @error('age') error @enderror"
                                       min="1" max="120" required>
                                @error('age') <p class="error-msg">{{ $message }}</p> @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label class="label-style">Address</label>
                                <input type="text" name="address"
                                       value="{{ old('address', $user->address) }}"
                                       class="input-field @error('address') error @enderror"
                                       required>
                                @error('address') <p class="error-msg">{{ $message }}</p> @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label class="label-style">Contact Number</label>
                                <input type="text" name="contact_number"
                                       value="{{ old('contact_number', $user->contact_number) }}"
                                       class="input-field @error('contact number') error @enderror"
                                       required>
                                @error('contact_number') <p class="error-msg">{{ $message }}</p> @enderror
                            </div>

                        </div>

                        <div class="mt-6 flex gap-3">
                            <a href="{{ route('users.index') }}"
                               class="flex-1 text-center bg-slate-700/60 hover:bg-slate-700 transition-all py-3 rounded-xl text-sm font-bold text-white">
                                Cancel
                            </a>
                            <button type="submit"
                                    class="flex-1 bg-amber-600 hover:bg-amber-500 active:scale-[0.98] transition-all py-3 rounded-xl text-sm font-bold text-white shadow-lg shadow-amber-500/20">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-layout>