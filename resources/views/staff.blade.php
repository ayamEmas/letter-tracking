<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight animate-fade-in" style="animation-delay: 0.1s">
            {{ __('Staff') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-lg sm:rounded-lg transform transition-all duration-300 hover:shadow-xl animate-fade-in" style="animation-delay: 0.2s">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center justify-between mb-6 animate-fade-in" style="animation-delay: 0.3s">
                        <h3 class="text-lg font-semibold text-gray-800">Staff Record</h3>
                        <a href="{{ route('staffAdd') }}" 
                           class="inline-flex items-center bg-black text-white text-sm px-4 py-2 rounded-md hover:bg-gray-800 transition-all duration-300 hover:shadow-md hover:-translate-y-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add Staff
                        </a>
                    </div>

                    <!-- Table Layout -->
                    <div class="hidden md:block overflow-x-auto custom-scrollbar">
                        <table class="min-w-full divide-y divide-gray-200 border border-gray-200 rounded-lg">
                            <thead class="bg-white sticky top-0 shadow-sm z-10">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider bg-white">#</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider bg-white">Name</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider bg-white">Email</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider bg-white">Department</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider bg-white">Position</th>
                                    <th class="px-4 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider bg-white text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($users as $index => $user)
                                    <tr class="hover:bg-gray-50 transition-colors duration-150 animate-fade-in" style="animation-delay: {{ 0.4 + ($index * 0.05) }}s">
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ $index + 1 }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">{{ $user->name }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ $user->department->name ?? 'No Department' }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ $user->role }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 text-center align-middle">
                                            <div class="flex justify-center items-center space-x-3">
                                                <!-- Edit Icon -->
                                                <a href="{{ route('staff.edit', $user->id) }}" 
                                                   class="text-blue-600 hover:text-blue-800 transition-all duration-300 hover:scale-110 hover:shadow-md p-1 rounded-full">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </a>

                                                <!-- Delete Icon -->
                                                <form action="{{ route('staff.destroy', $user->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="text-red-600 hover:text-red-800 transition-all duration-300 hover:scale-110 hover:shadow-md p-1 rounded-full"
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
                                    <tr class="animate-fade-in" style="animation-delay: 0.4s">
                                        <td colspan="6" class="px-4 py-3 text-sm text-gray-500 text-center">
                                            No users found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Mobile Layout -->
                    <div class="block md:hidden space-y-4">
                        @forelse ($users as $index => $user)
                            <div x-data="{ open: false }" 
                                 class="border border-gray-200 rounded-lg mb-4 shadow-sm transform transition-all duration-300 hover:shadow-md hover:-translate-y-1 animate-fade-in" 
                                 style="animation-delay: {{ 0.4 + ($index * 0.05) }}s">
                                <!-- Summary row -->
                                <div class="flex justify-between items-center px-4 py-3 bg-white rounded-t-lg">
                                    <div class="text-sm font-medium text-gray-800">
                                        {{ $index + 1 }}. {{ $user->name }}
                                    </div>
                                    <button @click="open = !open"
                                            class="text-sm text-indigo-600 hover:text-indigo-800 transition-colors duration-300 focus:outline-none">
                                        <span x-show="!open" class="flex items-center">
                                            View
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 transform transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </span>
                                        <span x-show="open" class="flex items-center">
                                            Hide
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 transform rotate-180 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </span>
                                    </button>
                                </div>
    
                                <!-- Detail section -->
                                <div x-show="open" 
                                     x-transition:enter="transition ease-out duration-300"
                                     x-transition:enter-start="opacity-0 transform -translate-y-2"
                                     x-transition:enter-end="opacity-100 transform translate-y-0"
                                     x-transition:leave="transition ease-in duration-300"
                                     x-transition:leave-start="opacity-100 transform translate-y-0"
                                     x-transition:leave-end="opacity-0 transform -translate-y-2"
                                     class="px-4 py-3 text-sm text-gray-700 bg-white border-t border-gray-200 rounded-b-lg">
                                    <div class="space-y-2">
                                        <div><strong>Email:</strong> {{ $user->email }}</div>
                                        <div><strong>Department:</strong> {{ $user->department->name ?? 'No Department' }}</div>
                                        <div><strong>Position:</strong> {{ $user->role }}</div>
                                        <div class="flex space-x-3 pt-2">
                                            <a href="{{ route('staff.edit', $user->id) }}" 
                                               class="text-blue-600 hover:text-blue-800 transition-all duration-300 hover:scale-110">
                                                ✏️ Edit
                                            </a>
                                            <form action="{{ route('staff.destroy', $user->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="text-red-600 hover:text-red-800 transition-all duration-300 hover:scale-110"
                                                        onclick="return confirm('Are you sure you want to delete this user?')">
                                                    🗑️ Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-gray-500 text-sm text-center animate-fade-in" style="animation-delay: 0.4s">
                                No staff found.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes fadeIn {
            from { 
                opacity: 0; 
                transform: translateY(20px); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }
        .animate-fade-in {
            opacity: 0;
            animation: fadeIn 0.8s ease-out forwards;
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
</x-app-layout>