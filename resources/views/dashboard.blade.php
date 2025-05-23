<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight animate-fade-in" style="animation-delay: 0.1s">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 space-y-10">
        <!-- Staff + Other Table -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/2 flex flex-col space-y-6">
                    <!-- Staff Table -->
                    <div class="bg-white/80 backdrop-blur-sm p-6 shadow-lg sm:rounded-lg transform transition-all duration-300 hover:shadow-xl hover:-translate-y-1 animate-fade-in" style="animation-delay: 0.2s">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">Staff List</h3>
                            <div class="bg-blue-100 text-blue-600 rounded-full p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-4a4 4 0 10-8 0 4 4 0 008 0zm6 4v2a2 2 0 01-2 2h-1.5M7 16v2a2 2 0 002 2h1.5" />
                                </svg>
                            </div>
                        </div>
                        <div class="overflow-y-auto max-h-[250px] custom-scrollbar">
                            <table class="min-w-full divide-y divide-gray-200 border border-gray-200 text-sm rounded-lg">
                                <thead class="bg-white sticky top-0 shadow-sm z-10">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider bg-white">#</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider bg-white">Name</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider bg-white">Email</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse ($users as $index => $user)
                                        <tr class="hover:bg-gray-50 transition-colors duration-150 animate-fade-in" style="animation-delay: {{ 0.3 + ($index * 0.05) }}s">
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ $index + 1 }}</td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">{{ $user->name }}</td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
                                        </tr>
                                    @empty
                                        <tr class="animate-fade-in" style="animation-delay: 0.3s">
                                            <td colspan="3" class="px-4 py-3 text-center text-sm text-gray-500">No staff found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Document Box -->
                    <div class="bg-white/80 backdrop-blur-sm p-6 shadow-lg sm:rounded-lg transform transition-all duration-300 hover:shadow-xl hover:-translate-y-1 animate-fade-in" style="animation-delay: 0.4s">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">Document List</h3>
                            <div class="bg-green-100 text-green-600 rounded-full p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 4H7a2 2 0 01-2-2V6a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                        </div>
                        <div class="overflow-y-auto max-h-[250px] custom-scrollbar">
                            <table class="min-w-full divide-y divide-gray-200 border border-gray-200 text-sm rounded-lg">
                                <thead class="bg-white sticky top-0 shadow-sm z-10">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider bg-white">#</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider bg-white">Title</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider bg-white">Department</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse ($letters as $index => $letter)
                                        <tr class="hover:bg-gray-50 transition-colors duration-150 animate-fade-in" style="animation-delay: {{ 0.5 + ($index * 0.05) }}s">
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ $index + 1 }}</td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">{{ $letter->title }}</td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ $letter->department->name ?? 'No Department' }}</td>
                                        </tr>
                                    @empty
                                        <tr class="animate-fade-in" style="animation-delay: 0.5s">
                                            <td colspan="3" class="px-4 py-3 text-center text-sm text-gray-500">No documents found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="md:w-1/2 md:pl-6">
                    <!-- User Count Box -->
                    <a href="{{ route('staff') }}" class="block transition-all duration-300 hover:shadow-xl hover:-translate-y-1 animate-fade-in" style="animation-delay: 0.6s">
                        <div class="bg-white/80 backdrop-blur-sm p-6 mb-6 shadow-lg sm:rounded-lg flex items-center hover:bg-gray-50/80">
                            <div class="bg-blue-100 text-blue-600 rounded-full p-4 mr-4 transform transition-transform duration-300 hover:scale-110">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-4a4 4 0 10-8 0 4 4 0 008 0zm6 4v2a2 2 0 01-2 2h-1.5M7 16v2a2 2 0 002 2h1.5" />
                                </svg>
                            </div>
                            <div>
                                <div class="text-gray-600 text-sm font-medium">Total Users</div>
                                <div class="text-3xl font-bold text-gray-800">{{ $users->count() }}</div>
                            </div>
                        </div>
                    </a>

                    <!-- Document Count Box -->
                    <a href="{{ route('history') }}" class="block transition-all duration-300 hover:shadow-xl hover:-translate-y-1 animate-fade-in" style="animation-delay: 0.7s">
                        <div class="bg-white/80 backdrop-blur-sm p-6 shadow-lg sm:rounded-lg flex items-center hover:bg-gray-50/80">
                            <div class="bg-green-100 text-green-600 rounded-full p-4 mr-4 transform transition-transform duration-300 hover:scale-110">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 4H7a2 2 0 01-2-2V6a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div>
                                <div class="text-gray-600 text-sm font-medium">Total Documents</div>
                                <div class="text-3xl font-bold text-gray-800">{{ $letters->count() }}</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
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
    </style>
</x-app-layout>
