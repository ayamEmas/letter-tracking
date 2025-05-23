<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight animate-fade-in" style="animation-delay: 0.1s">
            {{ __('Record') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-lg sm:rounded-lg transform transition-all duration-300 hover:shadow-xl animate-fade-in" style="animation-delay: 0.2s">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-6 text-gray-800 animate-fade-in" style="animation-delay: 0.3s">Record of the documents received</h3>

                    <div class="mb-4">
                        <form id="filterForm" method="GET" action="{{ route('history') }}" class="flex flex-col sm:flex-row sm:flex-wrap gap-2">
                            <input
                                type="text"
                                name="item_filter"
                                value="{{ request('item_filter') }}"
                                placeholder="Filter by title name"
                                class="border border-gray-300 rounded-md px-3 py-2 w-full sm:w-auto focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            >
                            <button
                                type="submit"
                                class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 w-full sm:w-auto"
                            >
                                Filter
                            </button>
                            <select
                                name="department_filter"
                                onchange="document.getElementById('filterForm').submit();"
                                class="border border-gray-300 rounded-md px-3 py-2 w-full sm:w-auto focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            >
                                <option value="">All Departments</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->name }}" {{ request('department_filter') == $department->name ? 'selected' : '' }}>
                                        {{ $department->name }}
                                    </option>
                                @endforeach
                            </select>
                            <select
                                name="year_filter"
                                onchange="document.getElementById('filterForm').submit();"
                                class="border border-gray-300 rounded-md px-3 py-2 w-full sm:w-24 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            >
                            <option value="">Years</option>
                            @for ($year = 2020; $year <= 2025; $year++)
                                <option value="{{ $year }}" {{ request('year_filter') == $year ? 'selected' : '' }}>
                                    {{ $year }}
                                </option>
                            @endfor

                            </select>
                        </form>
                    </div>

                    <!-- DESKTOP/TABLET: Table layout -->
                    <div class="hidden md:block overflow-x-auto custom-scrollbar">
                        <table class="min-w-full divide-y divide-gray-200 border border-gray-200 rounded-lg">
                            <thead class="bg-white sticky top-0 shadow-sm z-10">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider bg-white">#</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider bg-white">Date</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider bg-white">Title</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider bg-white">From</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider bg-white">To</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider bg-white">Department</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider bg-white">Type</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider bg-white">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($letters as $index => $letter)
                                    <tr class="hover:bg-gray-50 transition-colors duration-150 animate-fade-in" style="animation-delay: {{ 0.4 + ($index * 0.05) }}s">
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ $index + 1 }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">{{ $letter->date }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">{{ $letter->title }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ $letter->from }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ $letter->to }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ $letter->department->name ?? 'No Department' }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ $letter->document_type }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                            <div class="flex space-x-3">
                                                <!-- Edit Icon -->
                                                <a href="{{ route('letters.edit', $letter->id) }}" 
                                                   class="text-blue-600 hover:text-blue-800 transition-all duration-300 hover:scale-110 hover:shadow-md p-1 rounded-full">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </a>

                                                <!-- Delete Icon -->
                                                <form action="{{ route('letters.destroy', $letter->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="text-red-600 hover:text-red-800 transition-all duration-300 hover:scale-110 hover:shadow-md p-1 rounded-full"
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
                                    <tr class="animate-fade-in" style="animation-delay: 0.4s">
                                        <td colspan="8" class="px-4 py-3 text-sm text-gray-500 text-center">
                                            No documents found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- MOBILE: Collapsible layout -->
                    <div class="block md:hidden space-y-4">
                        @forelse ($letters as $index => $letter)
                            <div x-data="{ open: false }" 
                                 class="border border-gray-200 rounded-lg mb-4 shadow-sm transform transition-all duration-300 hover:shadow-md hover:-translate-y-1 animate-fade-in" 
                                 style="animation-delay: {{ 0.4 + ($index * 0.05) }}s">
                                <!-- Summary row -->
                                <div class="flex justify-between items-center px-4 py-3 bg-white rounded-t-lg">
                                    <div class="text-sm font-medium text-gray-800">
                                        {{ $index + 1 }}. {{ $letter->title }}
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
                                        <div><strong>Date:</strong> {{ $letter->date }}</div>
                                        <div><strong>From:</strong> {{ $letter->from }}</div>
                                        <div><strong>To:</strong> {{ $letter->to }}</div>
                                        <div><strong>Department:</strong> {{ $letter->department->name ?? 'No Department' }}</div>
                                        <div><strong>Type:</strong> {{ $letter->document_type }}</div>
                                        <div class="flex space-x-3 pt-2">
                                            <a href="{{ route('letters.edit', $letter->id) }}" 
                                               class="text-blue-600 hover:text-blue-800 transition-all duration-300 hover:scale-110">
                                                ✏️ Edit
                                            </a>
                                            <form action="{{ route('letters.destroy', $letter->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="text-red-600 hover:text-red-800 transition-all duration-300 hover:scale-110"
                                                        onclick="return confirm('Are you sure you want to delete this record?')">
                                                    🗑️ Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-gray-500 text-sm text-center animate-fade-in" style="animation-delay: 0.4s">
                                No documents found.
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
