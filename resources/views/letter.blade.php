<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight animate-fade-in" style="animation-delay: 0.1s">
            {{ __('Document Form Receive') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-lg sm:rounded-lg transform transition-all duration-300 hover:shadow-xl animate-fade-in" style="animation-delay: 0.2s">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-6 text-gray-800 animate-fade-in" style="animation-delay: 0.3s">Form</h3>
                    <form method="POST" action="{{ route('letters.store') }}" class="space-y-6">
                        @csrf

                        <!-- Date and Title Row -->
                        <div class="grid grid-cols-2 gap-4 mb-4 animate-fade-in" style="animation-delay: 0.4s">
                            <!-- Date -->
                            <div class="transform transition-all duration-300 hover:-translate-y-1">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="date">Date Receive</label>
                                <input type="date" name="date" id="date" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 hover:shadow-md" 
                                    required>
                            </div>

                            <!-- Title -->
                            <div class="transform transition-all duration-300 hover:-translate-y-1">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="title">Title</label>
                                <input type="text" name="title" id="title" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 hover:shadow-md" 
                                    required>
                            </div>
                        </div>

                        <!-- From and To Row -->
                        <div class="grid grid-cols-2 gap-4 mb-4 animate-fade-in" style="animation-delay: 0.5s">
                            <!-- From -->
                            <div class="transform transition-all duration-300 hover:-translate-y-1">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="from">From</label>
                                <input type="text" name="from" id="from" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 hover:shadow-md" 
                                    required>
                            </div>

                            <!-- To -->
                            <div class="transform transition-all duration-300 hover:-translate-y-1">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="to">To (Name)</label>
                                <input type="text" name="to" id="to" 
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
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Document Type -->
                            <div class="transform transition-all duration-300 hover:-translate-y-1">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="document_type">Document Type</label>
                                <input type="text" name="document_type" id="document_type" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 hover:shadow-md" 
                                    required>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="flex justify-end animate-fade-in" style="animation-delay: 0.7s">
                            <x-primary-button class="transform transition-all duration-300 hover:scale-105 hover:shadow-lg">
                                Submit Document
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