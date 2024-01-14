<form wire:submit="sendEmail"
    class="p-8 space-y-4 md:space-y-6 border border-gray-200 rounded-lg shadow bg-gray-100 dark:bg-gray-800 dark:border-gray-700">

    <h1 class="font-semibold text-xl text-gray-500 dark:text-gray-400">
        {{ __('pages/auth/forgot-password.title') }}
    </h1>

    @csrf

    @if (session()->has('success'))
        <x-flowbite.alert type="success">
            {{ session('success') }}
        </x-flowbite.alert>
    @elseif (session()->has('error'))
        <x-flowbite.alert type="error">
            {{ session('error') }}
        </x-flowbite.alert>
    @endif

    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
        {{ __('pages/auth/forgot-password.form_description') }}
    </p>

    <div>
        <x-flowbite.input-label :for="__('pages/auth/forgot-password.attributes.email')" :error="$errors->has('form.email')">
            {{ __('pages/auth/forgot-password.email_input.label') }}
        </x-flowbite.input-label>

        <x-flowbite.input wire:model.live='form.email' :id="__('pages/auth/forgot-password.attributes.email')" :placeholder="__('pages/auth/forgot-password.email_input.placeholder')" :error="$errors->has('form.email')" />

        @error('form.email')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <x-flowbite.button wire:loading.attr='disabled' class="flex gap-2 items-center justify-center">
        <i wire:loading wire:target='sendEmail' class="fa-solid fa-spinner animate-spin text-lg text-primary-200"></i>
        <span> {{ __('pages/auth/forgot-password.buttons.submit') }} </span>
    </x-flowbite.button>

    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
        {{ __('pages/auth/forgot-password.form_footer') }}

        <x-flowbite.link :href="route('auth.register', ['locale' => app()->getLocale()])">
            {{ __('pages/auth/forgot-password.form_footer_link') }}
        </x-flowbite.link>
    </p>
</form>
