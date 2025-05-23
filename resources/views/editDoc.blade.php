<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight animate-fade-in" style="animation-delay: 0.1s">
            {{ __('Detail Document Receive') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-lg sm:rounded-lg transform transition-all duration-300 hover:shadow-xl animate-fade-in" style="animation-delay: 0.2s">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center justify-between mb-6 animate-fade-in" style="animation-delay: 0.3s">
                        <a href="{{ route('history') }}" 
                           class="inline-flex items-center bg-indigo-600 text-white text-sm px-4 py-2 rounded-md hover:bg-indigo-700 transition-all duration-300 hover:shadow-md hover:-translate-y-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Back to Record
                        </a>
                    </div>
                    <form method="POST" action="{{ route('letters.update', $letter->id) }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Date and Title Row -->
                        <div class="grid grid-cols-2 gap-4 mb-4 animate-fade-in" style="animation-delay: 0.4s">
                            <!-- Date -->
                            <div class="transform transition-all duration-300 hover:-translate-y-1">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="date">Date Receive</label>
                                <input type="date" name="date" id="date" value="{{ $letter->date }}" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 hover:shadow-md" 
                                    required>
                            </div>

                            <!-- Title -->
                            <div class="transform transition-all duration-300 hover:-translate-y-1">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="title">Title</label>
                                <input type="text" name="title" id="title" value="{{ $letter->title }}" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 hover:shadow-md" 
                                    required>
                            </div>
                        </div>

                        <!-- From and To Row -->
                        <div class="grid grid-cols-2 gap-4 mb-4 animate-fade-in" style="animation-delay: 0.5s">
                            <!-- From -->
                            <div class="transform transition-all duration-300 hover:-translate-y-1">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="from">From</label>
                                <input type="text" name="from" id="from" value="{{ $letter->from }}" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 hover:shadow-md" 
                                    required>
                            </div>

                            <!-- To -->
                            <div class="transform transition-all duration-300 hover:-translate-y-1">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="to">To</label>
                                <input type="text" name="to" id="to" value="{{ $letter->to }}" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 hover:shadow-md" 
                                    required>
                            </div>
                        </div>

                        <!-- Department and Document Type Row -->
                        <div class="grid grid-cols-2 gap-4 mb-6 animate-fade-in" style="animation-delay: 0.6s">
                            <!-- Department -->
                            <div class="transform transition-all duration-300 hover:-translate-y-1">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="department_id">To (Department)</label>
                                <select name="department_id" id="department_id" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 hover:shadow-md" 
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
                            <div class="transform transition-all duration-300 hover:-translate-y-1">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="document_type">Document Type</label>
                                <input type="text" name="document_type" id="document_type" value="{{ $letter->document_type }}" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 hover:shadow-md" 
                                    required>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="flex justify-end animate-fade-in" style="animation-delay: 0.7s">
                            <x-primary-button class="transform transition-all duration-300 hover:scale-105 hover:shadow-lg">
                                Update Document
                            </x-primary-button>
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
                                class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50"
                            >
                                {{ session('success') }}
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