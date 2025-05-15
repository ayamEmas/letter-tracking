<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Staff Form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900"><div class="flex items-center justify-between mb-4">
                    <a href="{{ route('staff') }}" class="inline-block bg-indigo-600 text-white text-sm px-4 py-2 rounded-md hover:bg-indigo-700">
                        < Staff
                    </a>
                </div>
                    <form method="POST" action="{{ route('staff.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700" for="date">Name</label>
                            <input type="text" name="name" id="name" value="{{ $user->name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700" for="title">Email</label>
                            <input type="text" name="email" id="email" value="{{ $user->email }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700" for="from">Password</label>
                            <input type="password" name="password" id="password" value="{{ $user->password }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 bg-gray-200" readonly>
                        </div>

                        <!-- Department -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700" for="department_id">Department</label>
                            <select name="department_id" id="department_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
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

                        <!-- Position -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700" for="role">Position</label>
                            <input type="text" name="role" id="role" value="{{ $user->role }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>

                        <!-- Submit -->
                        <x-primary-button>
                            Update Staff
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