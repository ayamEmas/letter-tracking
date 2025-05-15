<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Document Receive') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center justify-between mb-4">
                        <a href="{{ route('history') }}" class="inline-block bg-indigo-600 text-white text-sm px-4 py-2 rounded-md hover:bg-indigo-700">
                            < Record
                        </a>
                    </div>
                    <form method="POST" action="{{ route('letters.update', $letter->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Date -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700" for="date">Date Receive</label>
                            <input type="date" name="date" id="date" value="{{ $letter->date }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>

                        <!-- Title -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700" for="title">Title</label>
                            <input type="text" name="title" id="title" value="{{ $letter->title }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>

                        <!-- From -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700" for="from">From</label>
                            <input type="text" name="from" id="from" value="{{ $letter->from }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>

                        <!-- To -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700" for="to">To</label>
                            <input type="text" name="to" id="to" value="{{ $letter->to }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>

                        <!-- Department -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700" for="department_id">To (Department)</label>
                            <select name="department_id" id="department_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                                <option value="">-- Select Department --</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}" {{ $letter->department_id == $department->id ? 'selected' : '' }}>
                                        {{ $department->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Document Type -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700" for="document_type">Document Type</label>
                            <input type="text" name="document_type" id="document_type" value="{{ $letter->document_type }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>

                        <!-- Submit -->
                        <x-primary-button>
                            Update Document
                        </x-primary-button>
                        @if (session('success'))
                            <div 
                                x-data="{ show: true }" 
                                x-show="show" 
                                x-init="setTimeout(() => show = false, 3000)" 
                                class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-green-500 text-white px-6 py-3 rounded shadow-lg z-50"
                            >
                                {{ session('success') }}
                            </div>
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>