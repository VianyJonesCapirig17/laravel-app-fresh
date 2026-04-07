<x-layout>
    <style>
        @keyframes gradientFlow { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }
        .animate-mesh { background: linear-gradient(-45deg, #741a1a, #1e1b4b, #ac3636, #020617); background-size: 400% 400%; animation: gradientFlow 10s ease infinite; }
        .glass-card { background: rgba(15, 23, 42, 0.8); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.1); }
        .input-field { @apply w-full rounded-xl bg-slate-950/50 border border-slate-700/50 text-white px-4 py-2.5 text-sm transition-all placeholder:text-slate-600 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20 focus:outline-none; }
        .label-style { @apply block text-[10px] font-semibold text-slate-400 mb-1 ml-1 uppercase tracking-wider; }
    </style>

    <div class="min-h-screen animate-mesh py-12 px-4 flex items-center font-sans antialiased">
        <div class="max-w-3xl mx-auto w-full">
            <div class="glass-card rounded-3xl shadow-2xl overflow-hidden">
                
                <div class="px-8 pt-8 pb-6 bg-gradient-to-b from-white/5 to-transparent">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-indigo-500/20 rounded-2xl ring-1 ring-indigo-400/30">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-white tracking-tight">User Registration</h1>
                            <p class="text-xs text-indigo-300 uppercase tracking-widest font-bold opacity-70">UM Data Systems</p>
                        </div>
                    </div>
                </div>

                <div class="px-8 pb-8">
                    <form method="POST" action="/user_registration">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                           
                            <div>
                                <label class="label-style">First Name</label>
                                <input type="text" name="first_name" required class="input-field" placeholder="firstname">
                            </div>
                            <div>
                                <label class="label-style">Last Name</label>
                                <input type="text" name="last_name" required class="input-field" placeholder="lastname">
                            </div>
                           
                            <div>
                                <label class="label-style">Middle Name</label>
                                <input type="text" name="middle_name" class="input-field" placeholder="middlename">
                            </div>
                            <div>
                                <label class="label-style">Nickname</label>
                                <input type="text" name="nickname" class="input-field" placeholder="nickname">
                            </div>
                            
                            <div>
                                <label class="label-style">Email Address</label>
                                <input type="email" name="email" required class="input-field" placeholder="email@example.com">
                            </div>
                            <div>
                                <label class="label-style">Age</label>
                                <input type="number" name="age" required class="input-field" placeholder="age">
                            </div>
                            
                            <div class="md:col-span-2">
                                <label class="label-style">Address</label>
                                <input type="text" name="address" required class="input-field" placeholder="address">
                            </div>
                            
                            <div class="md:col-span-2">
                                <label class="label-style">Contact Number</label>
                                <input type="text" name="contact_number" required class="input-field" placeholder="0912 345 6789">
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-500 active:scale-[0.98] transition-all py-3 rounded-xl text-sm font-bold text-white shadow-lg shadow-indigo-500/20">
                                Register User
                            </button>
                        </div>
                    </form>
                </div>

                
                <div class="px-8 py-8 border-t border-white/5">
                    <h2 class="text-sm font-bold text-slate-300 mb-4 uppercase tracking-widest">Registered Users</h2>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-slate-300">
                            <thead class="text-xs uppercase text-slate-500 font-bold border-b border-white/5">
                                <tr>
                                    <th class="pb-3 px-2">Name</th>
                                    <th class="pb-3 px-2">Email</th>
                                    <th class="pb-3 px-2 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5">
                                @forelse ($users as $user)
                                    <tr class="group hover:bg-white/5 transition-colors">
                                        <td class="py-4 px-2 font-medium text-white">{{ $user->first_name }} {{ $user->last_name }}</td>
                                        <td class="py-4 px-2 opacity-70">{{ $user->email }}</td>
                                        <td class="py-4 px-2 text-right">
                                            <div class="flex justify-end space-x-2">
                                                <a href="/users/{{ $user->id }}/edit" class="p-2 hover:text-indigo-400 transition-colors">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </a>
                                                <form method="POST" action="/users/{{ $user->id }}">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="p-2 hover:text-red-400 transition-colors">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="py-8 text-center text-slate-500 italic">No records found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>