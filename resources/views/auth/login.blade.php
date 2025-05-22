<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    {{-- Start Creative Form Design (Split Layout) --}}
    <div class="flex flex-col md:flex-row rounded-xl shadow-xl overflow-hidden max-w-screen-sm w-full"> {{-- Main container, flex row on md+, hide overflow for rounded corners --}}

        {{-- Left Section (Branding/Welcome) --}}
        {{-- This section is hidden on small screens and appears on medium and larger screens --}}
        <div class="hidden md:flex w-1/3 bg-indigo-700 text-white flex-col items-center justify-center p-6"> {{-- Colored background, takes 1/3 width on md+ --}}
            {{-- Removed the application logo from here --}}
            <h2 class="text-2xl font-bold text-center mb-4">Welcome!</h2> {{-- A simple welcoming title --}}
        </div>

        {{-- Right Section (Form Inputs) --}}
        <div class="w-full md:w-2/3 bg-white p-8 flex flex-col justify-center"> {{-- White background, takes 2/3 width on md+ --}}
             {{-- Logo for small screens --}}
            <div class="md:hidden w-full flex justify-center mb-6">
            </div>

            <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center md:text-left">Login</h3> {{-- Login Title --}}

            <form method="POST" action="{{ route('login') }}" class="w-full">
                @csrf

                <!-- Email Address -->
                <div class="mb-4"> {{-- Added margin bottom --}}
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-6"> {{-- Added margin bottom --}}
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6"> {{-- Stacked on small, row on md --}}
                    <label for="remember_me" class="inline-flex items-center mb-4 md:mb-0"> {{-- Margin bottom on small --}}
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
                <!-- Login Button -->
                <div class="flex justify-center"> {{-- Center the button --}}
                    <x-primary-button class="w-full justify-center py-2 px-4"> {{-- Button takes full width or adjust as needed --}}
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
    {{-- End Creative Form Design (Split Layout) --}}

</x-guest-layout>
