<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight animate-fade-in" style="animation-delay: 0.1s">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white/80 backdrop-blur-sm shadow-lg sm:rounded-lg transform transition-all duration-300 hover:shadow-xl animate-fade-in" style="animation-delay: 0.2s">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white/80 backdrop-blur-sm shadow-lg sm:rounded-lg transform transition-all duration-300 hover:shadow-xl animate-fade-in" style="animation-delay: 0.3s">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white/80 backdrop-blur-sm shadow-lg sm:rounded-lg transform transition-all duration-300 hover:shadow-xl animate-fade-in" style="animation-delay: 0.4s">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
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
