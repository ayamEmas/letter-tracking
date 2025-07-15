<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <div class="h-10 w-10 rounded-lg bg-indigo-100 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
            </div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight animate-fade-in" style="animation-delay: 0.1s">
                {{ __('Edit Staff Member') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/90 backdrop-blur-sm overflow-hidden shadow-lg sm:rounded-lg transform transition-all duration-300 hover:shadow-xl animate-fade-in" style="animation-delay: 0.2s">
                <div class="p-8 text-gray-900">
                    <!-- Header Section -->
                    <div class="flex items-center justify-between mb-8 animate-fade-in" style="animation-delay: 0.3s">
                        <div class="flex items-center space-x-3">
                            <div class="h-10 w-10 rounded-lg bg-indigo-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800">Staff Information</h3>
                        </div>
                        <a href="{{ route('staff') }}" 
                           class="inline-flex items-center bg-red-600 text-white text-sm px-4 py-2 rounded-lg hover:bg-red-700 transition-all duration-300 hover:shadow-md hover:-translate-y-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Back to Staff
                        </a>
                    </div>

                    <form method="POST" action="{{ route('staff.update', $user->id) }}" class="space-y-8">
                        @csrf
                        @method('PUT')

                        <!-- Name and Email Row -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 animate-fade-in" style="animation-delay: 0.4s">
                            <!-- Name -->
                            <div class="bg-gray-50 p-4 rounded-xl transform transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
                                <label class="flex items-center space-x-2 text-sm font-medium text-gray-700 mb-2" for="name">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span>Full Name</span>
                                </label>
                                <input type="text" name="name" id="name" value="{{ $user->name }}" 
                                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300" 
                                    required>
                            </div>

                            <!-- Email -->
                            <div class="bg-gray-50 p-4 rounded-xl transform transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
                                <label class="flex items-center space-x-2 text-sm font-medium text-gray-700 mb-2" for="email">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <span>Email Address</span>
                                </label>
                                <input type="email" name="email" id="email" value="{{ $user->email }}" 
                                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300" 
                                    required>
                            </div>
                        </div>

                        <!-- Password, Department, and Role Row -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 animate-fade-in" style="animation-delay: 0.5s">
                            <!-- Password -->
                            <div class="bg-gray-50 p-4 rounded-xl transform transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
                                <label class="flex items-center space-x-2 text-sm font-medium text-gray-700 mb-2" for="password">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                    <span>Password</span>
                                </label>
                                <input type="password" name="password" id="password" value="{{ $user->password }}" 
                                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-gray-200 transition-all duration-300" 
                                    readonly>
                            </div>

                            <!-- Department -->
                            <div class="bg-gray-50 p-4 rounded-xl transform transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
                                <label class="flex items-center space-x-2 text-sm font-medium text-gray-700 mb-2" for="department_id">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                    <span>Department</span>
                                </label>
                                <select name="department_id" id="department_id" 
                                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300" 
                                    required>
                                    <option value="">-- Select Department --</option>
                                    @foreach ($departments as $department)
                                        @if ($department->name !== 'Managing Director' && $department->name !== 'General Manager')
                                            <option value="{{ $department->id }}" {{ $user->department_id == $department->id ? 'selected' : '' }} >
                                                {{ $department->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <!-- Role -->
                            <div class="bg-gray-50 p-4 rounded-xl transform transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
                                <label class="flex items-center space-x-2 text-sm font-medium text-gray-700 mb-2" for="role">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <span>Role</span>
                                </label>
                                <input type="text" name="role" id="role" value="{{ $user->role }}" 
                                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300" 
                                    required>
                            </div>
                            <!-- Position -->
                            <div class="bg-gray-50 p-4 rounded-xl transform transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
                                <label class="flex items-center space-x-2 text-sm font-medium text-gray-700 mb-2" for="position">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    <span>Position</span>
                                </label>
                                <input type="text" name="position" id="position" value="{{ $user->position }}" 
                                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300">
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end animate-fade-in" style="animation-delay: 0.6s">
                            <button type="submit" 
                                class="inline-flex items-center px-6 py-3 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Update Staff Member
                            </button>
                        </div>

                        @if (session('success'))
                            <div 
                                x-data="{ show: true }" 
                                x-show="show" 
                                x-init="setTimeout(() => show = false, 3000)" 
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform scale-90"
                                x-transition:enter-end="opacity-100 transform scale-100"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100 transform scale-100"
                                x-transition:leave-end="opacity-0 transform scale-90"
                                class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 flex items-center space-x-2"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>{{ session('success') }}</span>
                            </div>
                        @endif
                    </form>
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
        input:focus, select:focus {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
    </style>
</x-app-layout>