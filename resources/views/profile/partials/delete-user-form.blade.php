<section class="space-y-6 animate-fade-in" style="animation-delay: 0.2s">
    <header class="animate-fade-in" style="animation-delay: 0.3s">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="transform transition-all duration-300 hover:scale-105 hover:shadow-lg animate-fade-in"
        style="animation-delay: 0.4s"
    >{{ __('Delete Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 animate-fade-in" style="animation-delay: 0.1s">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 animate-fade-in" style="animation-delay: 0.2s">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6 animate-fade-in" style="animation-delay: 0.3s">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4 transition-all duration-300 hover:shadow-md"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end animate-fade-in" style="animation-delay: 0.4s">
                <x-secondary-button x-on:click="$dispatch('close')" class="transform transition-all duration-300 hover:scale-105 hover:shadow-lg">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3 transform transition-all duration-300 hover:scale-105 hover:shadow-lg">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
