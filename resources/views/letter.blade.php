<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Document Form Receive') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <h3 class="text-lg font-semibold mb-4"> Form </h3>
                    <form method="POST" action="{{ route('letters.store') }}">
                        @csrf

                        <!-- Date and Title Row -->
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <!-- Date -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="date">Date Receive</label>
                                <input type="date" name="date" id="date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                            </div>

                            <!-- Title -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="title">Title</label>
                                <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                            </div>
                        </div>

                        <!-- From and To Row -->
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <!-- From -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="from">From</label>
                                <input type="text" name="from" id="from" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                            </div>

                            <!-- To -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="to">To (Name)</label>
                                <input type="text" name="to" id="to" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                            </div>
                        </div>

                        <!-- Department and Document Type Row -->
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <!-- Department -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="department_id">To (Department)</label>
                                <select name="department_id" id="department_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                                    <option value="">-- Select Department --</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Document Type -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="document_type">Document Type</label>
                                <input type="text" name="document_type" id="document_type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="flex justify-end">
                            <x-primary-button>
                                Submit Document
                            </x-primary-button>
                        </div>
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