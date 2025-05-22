<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 space-y-10">
        <!-- Staff + Other Table -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/2 flex flex-col space-y-6">

                    <!-- Staff Table -->
                    <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                        <h3 class="text-lg font-semibold mb-4 text-gray-800">Staff List</h3>
                        <div class="overflow-y-auto max-h-[250px]">
                            <table class="min-w-full divide-y divide-gray-200 border border-gray-300 text-sm">
                                <thead class="bg-gray-100 sticky top-0">
                                    <tr>
                                        <th class="px-4 py-2 text-left">#</th>
                                        <th class="px-4 py-2 text-left">Name</th>
                                        <th class="px-4 py-2 text-left">Email</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @forelse ($users as $index => $user)
                                        <tr>
                                            <td class="px-4 py-2">{{ $index + 1 }}</td>
                                            <td class="px-4 py-2">{{ $user->name }}</td>
                                            <td class="px-4 py-2">{{ $user->email }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="px-4 py-2 text-center text-gray-500">No staff found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Document Box -->
                    <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                        <h3 class="text-lg font-semibold mb-4 text-gray-800">Document List</h3>
                        <div class="overflow-y-auto max-h-[250px]">
                            <table class="min-w-full divide-y divide-gray-200 border border-gray-300 text-sm">
                                <thead class="bg-gray-100 sticky top-0">
                                    <tr>
                                        <th class="px-4 py-2 text-left">#</th>
                                        <th class="px-4 py-2 text-left">Title</th>
                                        <th class="px-4 py-2 text-left">Department</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @forelse ($letters as $index => $letter)
                                        <tr>
                                            <td class="px-4 py-2">{{ $index + 1 }}</td>
                                            <td class="px-4 py-2">{{ $letter->title }}</td>
                                            <td class="px-4 py-2">{{ $letter->department->name ?? 'No Department' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="px-4 py-2 text-center text-gray-500">No staff found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Right Column (Empty for now) -->
                <div class="md:w-1/2 md:pl-6">
                    <!-- User Count Box -->
                    <a href="{{ route('staff') }}" class="block transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                        <div class="bg-white p-6 mb-6 shadow-sm sm:rounded-lg flex items-center hover:bg-gray-50">
                            <!-- User Icon -->
                            <div class="bg-blue-100 text-blue-600 rounded-full p-3 mr-4">
                                <!-- Heroicon: User Group -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-4a4 4 0 10-8 0 4 4 0 008 0zm6 4v2a2 2 0 01-2 2h-1.5M7 16v2a2 2 0 002 2h1.5" />
                                </svg>
                            </div>
                            <div>
                                <div class="text-gray-600">Total Users</div>
                                <div class="text-2xl font-bold">{{ $users->count() }}</div>
                            </div>
                        </div>
                    </a>

                    <!-- Document Count Box -->
                    <a href="{{ route('history') }}" class="block transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                        <div class="bg-white p-6 shadow-sm sm:rounded-lg flex items-center hover:bg-gray-50">
                            <!-- Document Icon -->
                            <div class="bg-green-100 text-green-600 rounded-full p-3 mr-4">
                                <!-- Heroicon: Document Text -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 4H7a2 2 0 01-2-2V6a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div>
                                <div class="text-gray-600">Total Documents</div>
                                <div class="text-2xl font-bold">{{ $letters->count() }}</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
