<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Staff') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold">Staff Record</h3>
                        <a href="{{ route('staffAdd') }}" class="bg-black text-white text-sm px-4 py-2 rounded-md hover:bg-gray-800 text-center w-full sm:w-auto">
                            Add Staff
                        </a>
                    </div>

                    <!-- Table Layout -->
                    <div class="hidden md:block overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 border border-gray-300">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">#</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Name</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Email</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Department</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Position</th>
                                    <th class="px-4 py-2 text-sm font-medium text-gray-600 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse ($users as $index => $user)
                                    <tr>
                                        <td class="px-4 py-2 text-sm text-gray-700">{{ $index + 1 }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-700">{{ $user->name }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-700">{{ $user->email }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-700">{{ $user->department->name ?? 'No Department' }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-700">{{ $user->role }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-700 text-center align-middle">
                                            <div class="flex justify-center items-center space-x-3">
                                                <!-- Edit Icon -->
                                                <a href="{{ route('staff.edit', $user->id) }}" 
                                                   class="text-blue-600 hover:text-blue-800 transition-transform duration-300 hover:scale-110">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </a>

                                                <!-- Delete Icon -->
                                                <form action="{{ route('staff.destroy', $user->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="text-red-600 hover:text-red-800 transition-transform duration-300 hover:scale-110"
                                                            onclick="return confirm('Are you sure you want to delete this user?')">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-4 py-2 text-sm text-gray-500 text-center">
                                            No users found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Mobile Layout -->
                    <div class="block md:hidden">
                        @forelse ($users as $index => $user)
                            <div x-data="{ open: false }" class="border border-gray-200 rounded-md mb-4 shadow-sm">
                                <!-- Summary row -->
                                <div class="flex justify-between items-center px-4 py-3 bg-gray-50">
                                    <div class="text-sm font-medium text-gray-800">
                                        {{ $index + 1 }}. {{ $user->name }}
                                    </div>
                                    <button @click="open = !open"
                                            class="text-sm text-indigo-600 hover:underline focus:outline-none">
                                        <span x-show="!open">View</span>
                                        <span x-show="open">Hide</span>
                                    </button>
                                </div>
    
                                <!-- Detail section -->
                                <div x-show="open" x-transition class="px-4 py-3 text-sm text-gray-700 bg-white border-t border-gray-200">
                                    <div><strong>Email:</strong> {{ $user->email }}</div>
                                    <div><strong>Department:</strong> {{ $user->department->name ?? 'No Department' }}</div>
                                    <div><strong>Position:</strong> {{ $user->role }}</div>
                                    <div><strong>Action:</strong> <a href="{{ route('staff.edit', $user->id) }}" class="text-indigo-600 hover:text-indigo-800">✏️</a></div>
                                </div>
                            </div>
                        @empty
                            <div class="text-gray-500 text-sm text-center">
                                No staff found.
                            </div>
                        @endforelse
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>