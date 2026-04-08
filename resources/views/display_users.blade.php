<x-layout>
    <x-slot:title>Registered Users</x-slot:title>
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-500/20 border border-green-500 text-green-200 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="max-w-6xl mx-auto mt-10 p-6 bg-white/5 border border-white/10 rounded-xl">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-white">User Directory</h2>
            <a href="/user_registration" class="text-sm bg-indigo-600 px-4 py-2 rounded text-white hover:bg-indigo-700 transition">
                Add New User
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-300">
                <thead class="bg-white/10 text-white uppercase text-xs">
                    <tr>
                        <th class="p-4">Name</th>
                        <th class="p-4">Email</th>
                        <th class="p-4">Nickname</th>
                        <th class="p-4">Age</th>
                        <th class="p-4">Contact</th>
                        <th class="p-4">Address</th>
                        <th class="p-4 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @foreach($users as $user)
                        <tr class="hover:bg-white/5 transition">
                            <td class="p-4 text-white font-medium">
                                {{ $user->firstname }} {{ $user->lastname }}
                            </td>
                            <td class="p-4">{{ $user->email }}</td>
                            <td class="p-4 italic text-indigo-400">{{ $user->nickname ?? 'N/A' }}</td>
                            <td class="p-4">{{ $user->age }}</td>
                            <td class="p-4">{{ $user->contact_number }}</td>
                            <td class="p-4 truncate max-w-xs">{{ $user->address }}</td>
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-4">
                                    <a href="/users/{{ $user->id }}/edit" class="text-indigo-400 hover:text-indigo-300 font-semibold transition">
                                        Edit
                                    </a>
                                    <form action="/users/{{ $user->id }}" method="POST" onsubmit="return confirm('Delete this user?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-400 font-semibold transition">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($users->isEmpty())
            <div class="text-center py-10 text-gray-500">
                No users found in the database.
            </div>
        @endif
    </div>
</x-layout>