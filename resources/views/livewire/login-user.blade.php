<form wire:submit.prevent='login'
    class="p-8 space-y-4 md:space-y-6 border border-gray-200 rounded-lg shadow bg-gray-100 dark:bg-gray-800 dark:border-gray-700">

    <h1 class="font-semibold text-xl text-gray-500 dark:text-gray-400">
        {{ __('pages/auth/login.form_title') }}
    </h1>

    @if (session()->has('message'))
        <div class="flex items-center p-4 mb-4 text-sm text-error-800 rounded-lg bg-red-50 dark:bg-error-900 dark:text-red-400"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                {{ session('message') }}
            </div>
        </div>
    @endif

    @csrf

    <div>
        <x-flowbite.input-label :for="__('pages/auth/login.attributes.email')" :error="$errors->has('email')">
            {{ __('pages/auth/login.email_input.label') }}
        </x-flowbite.input-label>

        <x-flowbite.input wire:model='credentials.email' :id="__('pages/auth/login.attributes.email')" :placeholder="__('pages/auth/login.email_input.placeholder')" :error="$errors->has('email')" />
    </div>

    <div>
        <x-flowbite.input-label :for="__('pages/auth/login.attributes.password')">
            {{ __('pages/auth/login.password_input.label') }}
        </x-flowbite.input-label>

        <x-flowbite.input wire:model='credentials.password' :id="__('pages/auth/login.attributes.password')" :placeholder="__('pages/auth/login.password_input.placeholder')" type='password' />
    </div>

    <x-flowbite.button wire:loading.attr='disabled'>
        <span wire:loading.remove> {{ __('pages/auth/login.form_button') }} </span>
        <x-css-spinner wire:loading class="animate-spin" />
    </x-flowbite.button>

    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
        {{ __('pages/auth/login.form_footer.does_not_have_an_account') }}

        <x-flowbite.link :href="route('auth.register', ['locale' => app()->getLocale()])">
            {{ __('pages/auth/login.form_footer.sign_up_here') }}
        </x-flowbite.link>
    </p>
</form>
