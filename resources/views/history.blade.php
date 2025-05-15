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
                                            <a href="{{ route('letters.edit', $letter->id) }}">
                                                ✏️
                                            </a>
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
