<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Document Transfer History
            </h2>
            <a href="{{ route('history') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Record
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Document Details Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Document Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-600">Title</p>
                            <p class="font-medium">{{ $letter->title }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Date</p>
                            <p class="font-medium">{{ \Carbon\Carbon::parse($letter->date)->format('Y-m-d') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">From</p>
                            <p class="font-medium">{{ $letter->from }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Current Holder</p>
                            <p class="font-medium">{{ $letter->to }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Department</p>
                            <p class="font-medium">{{ $letter->department->name ?? 'No Department' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Document Type</p>
                            <p class="font-medium">{{ $letter->document_type }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Transfer History Timeline -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-6">Transfer History</h3>
                    
                    <div class="relative">
                        <!-- Timeline line -->
                        <div class="absolute left-4 top-0 bottom-0 w-0.5 bg-gray-200"></div>

                        @forelse($tracks as $track)
                            <div class="relative mb-8 ml-8">
                                <!-- Timeline dot -->
                                <div class="absolute -left-8 mt-1.5 w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>

                                <!-- Content -->
                                <div class="bg-gray-50 rounded-lg p-4 shadow-sm">
                                    <div class="flex justify-between items-start mb-2">
                                        <div>
                                            <p class="text-sm text-gray-500">
                                                {{ \Carbon\Carbon::parse($track->created_at)->format('F j, Y g:i A') }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="space-y-3">
                                        <div class="flex items-center space-x-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            <div>
                                                <p class="text-sm text-gray-600">From</p>
                                                <p class="font-medium">{{ $track->userFrom->name ?? 'N/A' }}</p>
                                                <p class="text-sm text-gray-500">{{ $track->departmentFrom->name ?? 'N/A' }}</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center space-x-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                            </svg>
                                        </div>

                                        <div class="flex items-center space-x-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            <div>
                                                <p class="text-sm text-gray-600">To</p>
                                                <p class="font-medium">{{ $track->userTo->name ?? 'N/A' }}</p>
                                                <p class="text-sm text-gray-500">{{ $track->departmentTo->name ?? 'N/A' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 4H7a2 2 0 01-2-2V6a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z" />
                                </svg>
                                <p class="text-gray-500">No transfer history found for this document.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 