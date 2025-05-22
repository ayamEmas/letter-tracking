<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Record') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Record of the documents received</h3>

                    <!-- DESKTOP/TABLET: Table layout -->
                    <div class="hidden md:block overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 border border-gray-300">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">#</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Date</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Title</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">From</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">To</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Department</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Type</th>
                                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse ($letters as $index => $letter)
                                    <tr>
                                        <td class="px-4 py-2 text-sm text-gray-700">{{ $index + 1 }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-700">{{ $letter->date }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-700">{{ $letter->title }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-700">{{ $letter->from }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-700">{{ $letter->to }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-700">{{ $letter->department->name ?? 'No Department' }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-700">{{ $letter->document_type }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-700">
                                            <div class="flex space-x-3">
                                                <!-- Edit Icon -->
                                                <a href="{{ route('letters.edit', $letter->id) }}" 
                                                   class="text-blue-600 hover:text-blue-800 transition-transform duration-300 hover:scale-110">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </a>

                                                <!-- Delete Icon -->
                                                <form action="{{ route('letters.destroy', $letter->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="text-red-600 hover:text-red-800 transition-transform duration-300 hover:scale-110"
                                                            onclick="return confirm('Are you sure you want to delete this record?')">
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
                                        <td colspan="7" class="px-4 py-2 text-sm text-gray-500 text-center">
                                            No documents found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- MOBILE: Collapsible layout -->
                    <div class="block md:hidden">
                        @forelse ($letters as $index => $letter)
                            <div x-data="{ open: false }" class="border border-gray-200 rounded-md mb-4 shadow-sm">
                                <!-- Summary row -->
                                <div class="flex justify-between items-center px-4 py-3 bg-gray-50">
                                    <div class="text-sm font-medium text-gray-800">
                                        {{ $index + 1 }}. {{ $letter->title }}
                                    </div>
                                    <button @click="open = !open"
                                            class="text-sm text-indigo-600 hover:underline focus:outline-none">
                                        <span x-show="!open">View</span>
                                        <span x-show="open">Hide</span>
                                    </button>
                                </div>

                                <!-- Detail section -->
                                <div x-show="open" x-transition class="px-4 py-3 text-sm text-gray-700 bg-white border-t border-gray-200">
                                    <div><strong>Date:</strong> {{ $letter->date }}</div>
                                    <div><strong>From:</strong> {{ $letter->from }}</div>
                                    <div><strong>To:</strong> {{ $letter->to }}</div>
                                    <div><strong>Department:</strong> {{ $letter->department->name ?? 'No Department' }}</div>
                                    <div><strong>Type:</strong> {{ $letter->document_type }}</div>
                                    <div><strong>Edit:</strong> <a href="{{ route('letters.edit', $letter->id) }}" class="text-indigo-600 hover:text-indigo-800">✏️</a></div>
                                </div>
                            </div>
                        @empty
                            <div class="text-gray-500 text-sm text-center">
                                No documents found.
                            </div>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
