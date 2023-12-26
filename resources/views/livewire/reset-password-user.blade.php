<form wire:submit.prevent='resetPassword'
    class="p-8 space-y-4 md:space-y-6 border border-gray-200 rounded-lg shadow bg-gray-100 dark:bg-gray-800 dark:border-gray-700">

    <h1 class="text-2xl font-extrabold leading-none tracking-tight text-gray-900 dark:text-white">
        {{ __('pages/auth/reset-password.title') }}
    </h1>

    @csrf

    @if (session()->has('success'))
        <x-flowbite.alert type="success">
            {{ session('success') }}
        </x-flowbite.alert>

        <script>
            setTimeout(() => Livewire.emit('redirect'), 2000);
        </script>
    @elseif (session()->has('error'))
        <x-flowbite.alert type="error">
            {{ session('error') }}
        </x-flowbite.alert>
    @endif

    <p class="text-sm text-gray-600 dark:text-gray-400">
        {{ __('pages/auth/reset-password.description') }}
    </p>

    <div class="space-y-2">
        <x-flowbite.input-label :for="__('pages/auth/reset-password.attributes.password')" :error="$errors->has('form.password')">
            {{ __('pages/auth/reset-password.password_input.label') }}
        </x-flowbite.input-label>

        <x-flowbite.input wire:model.live.200ms='form.password' type='password' :id="__('pages/auth/reset-password.attributes.password')" :placeholder="__('pages/auth/reset-password.password_input.placeholder')"
            :error="$errors->has('form.password')" />

        @error('form.password')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div class="space-y-2">
        <x-flowbite.input-label :for="__('pages/auth/reset-password.attributes.password_confirmation')" :error="$errors->has('form.password_confirmation')">
            {{ __('pages/auth/reset-password.password_confirmation_input.label') }}
        </x-flowbite.input-label>

        <x-flowbite.input wire:model.live.200ms='form.password_confirmation' type='password' :id="__('pages/auth/reset-password.attributes.password_confirmation')"
            :placeholder="__('pages/auth/reset-password.password_confirmation_input.placeholder')" :error="$errors->has('form.password_confirmation')" />

        @error('form.password_confirmation')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex items-center justify-between">
        <a href="{{ route('auth.login', ['locale' => app()->getLocale()]) }}"
            class="text-sm text-blue-600 hover:text-blue-700 dark:text-blue-500 dark:hover:text-blue-400">
            {{ __('pages/auth/reset-password.go_to_login_link') }}
        </a>

        <x-flowbite.button wire:loading.attr='disabled' class="max-w-fit flex gap-2 items-center justify-center">
            <i wire:loading wire:target='resetPassword'
                class="fa-solid fa-spinner animate-spin text-lg text-primary-200"></i>
            <span> {{ __('pages/auth/reset-password.submit_button') }} </span>
        </x-flowbite.button>
    </div>

    <script>
        Livewire.on('redirect', () => {
            window.location.href = "{{ route('auth.login', ['locale' => app()->getLocale()]) }}"
        })
    </script>
</form>
