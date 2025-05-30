<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight animate-fade-in" style="animation-delay: 0.1s">
            {{ __('Detail Document Receive') }}
        </h2>
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
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-semibold text-gray-800">Edit Document</h2>
                        </div>
                        <a href="{{ route('history') }}" 
                           class="inline-flex items-center bg-red-600 text-white text-sm px-4 py-2 rounded-lg hover:bg-red-700 transition-all duration-300 hover:shadow-md hover:-translate-y-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Back to Record
                        </a>
                    </div>

                    <form method="POST" action="{{ route('letters.update', $letter->id) }}" class="space-y-8" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Date and Title Row -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 animate-fade-in" style="animation-delay: 0.4s">
                            <!-- Date -->
                            <div class="bg-gray-50 p-4 rounded-xl transform transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
                                <label class="flex items-center space-x-2 text-sm font-medium text-gray-700 mb-2" for="date">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span>Date Receive</span>
                                </label>
                                <input type="date" name="date" id="date" value="{{ $letter->date->format('Y-m-d') }}" 
                                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300" 
                                    required>
                            </div>

                            <!-- Title -->
                            <div class="bg-gray-50 p-4 rounded-xl transform transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
                                <label class="flex items-center space-x-2 text-sm font-medium text-gray-700 mb-2" for="title">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 4H7a2 2 0 01-2-2V6a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z" />
                                    </svg>
                                    <span>Title</span>
                                </label>
                                <input type="text" name="title" id="title" value="{{ $letter->title }}" 
                                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300" 
                                    required>
                            </div>
                        </div>

                        <!-- From and To Row -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 animate-fade-in" style="animation-delay: 0.5s">
                            <!-- From -->
                            <div class="bg-gray-50 p-4 rounded-xl transform transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
                                <label class="flex items-center space-x-2 text-sm font-medium text-gray-700 mb-2" for="from">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <span>From</span>
                                </label>
                                <input type="text" name="from" id="from" value="{{ $letter->from }}" 
                                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300" 
                                    required>
                            </div>

                            <!-- To -->
                            <div class="bg-gray-50 p-4 rounded-xl transform transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
                                <label class="flex items-center space-x-2 text-sm font-medium text-gray-700 mb-2" for="to">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span>To</span>
                                </label>
                                <input type="text" name="to" id="to" value="{{ $letter->to }}" 
                                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300" 
                                    required>
                            </div>
                        </div>

                        <!-- Department and Document Type Row -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 animate-fade-in" style="animation-delay: 0.6s">
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
                                        <option value="{{ $department->id }}" {{ $letter->department_id == $department->id ? 'selected' : '' }}>
                                            {{ $department->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Document Type -->
                            <div class="bg-gray-50 p-4 rounded-xl transform transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
                                <label class="flex items-center space-x-2 text-sm font-medium text-gray-700 mb-2" for="document_type">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 4H7a2 2 0 01-2-2V6a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z" />
                                    </svg>
                                    <span>Document Type</span>
                                </label>
                                <input type="text" name="document_type" id="document_type" value="{{ $letter->document_type }}" 
                                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300" 
                                    required>
                            </div>
                        </div>

                        <!-- Attachment Section -->
                        <div class="animate-fade-in" style="animation-delay: 0.7s">
                            <div class="bg-gray-50 p-4 rounded-xl transform transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
                                <label class="flex items-center space-x-2 text-sm font-medium text-gray-700 mb-2" for="attachment">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                    </svg>
                                    <span>Attachment</span>
                                </label>

                                @if($letter->attachment_path)
                                <div class="mb-4 p-3 bg-white rounded-lg border border-gray-200">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                            </svg>
                                            <span class="text-sm text-gray-600">{{ $letter->attachment_name }}</span>
                                        </div>
                                        <a href="{{ Storage::url($letter->attachment_path) }}" 
                                           target="_blank"
                                           class="text-indigo-600 hover:text-indigo-800 transition-colors duration-200 text-sm">
                                            View File
                                        </a>
                                    </div>
                                </div>
                                @endif

                                <input type="file" name="attachment" id="attachment" 
                                    class="mt-1 block w-full text-sm text-gray-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-lg file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-indigo-50 file:text-indigo-700
                                    hover:file:bg-indigo-100
                                    focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                    accept=".pdf,.jpg,.jpeg,.png">
                                <p class="mt-1 text-sm text-gray-500">Accepted formats: PDF, JPG, JPEG, PNG (Max 10MB)</p>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end animate-fade-in" style="animation-delay: 0.7s">
                            <button type="submit" 
                                class="inline-flex items-center px-6 py-3 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Update Document
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