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
                        <a href="{{ route('staffAdd') }}" class="inline-block bg-indigo-600 text-white text-sm px-4 py-2 rounded-md hover:bg-indigo-700">
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
                                            <div class="flex justify-center items-center h-full">
                                                <a href="{{ route('staff.edit', $user->id) }}">
                                                    ✏️
                                                </a>
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