<form wire:submit.prevent='save'
    class="p-8 space-y-4 md:space-y-6 border border-gray-200 rounded-lg shadow bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

    <h1 class="font-semibold text-xl">{{ __('pages/auth/register.form_title') }}</h1>

    @if (session()->has('message'))
        <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
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
        <x-flowbite.input-label :for="__('pages/auth/register.attributes.name')" :error="$errors->has('form.name')">
            {{ __('pages/auth/register.name_input.label') }}
        </x-flowbite.input-label>

        <x-flowbite.input wire:model.live.debounce.150ms='form.name' :id="__('pages/auth/register.attributes.name')" :placeholder="__('pages/auth/register.name_input.placeholder')"
            :error="$errors->has('form.name')" />

        @error('form.name')
            <p class="mt-2 text-sm text-error-600 dark:text-error-500">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <x-flowbite.input-label :for="__('pages/auth/register.attributes.email')" :error="$errors->has('form.email')">
            {{ __('pages/auth/register.email_input.label') }}
        </x-flowbite.input-label>

        <x-flowbite.input wire:model.live.debounce.150ms='form.email' :id="__('pages/auth/register.attributes.email')" :placeholder="__('pages/auth/register.email_input.placeholder')"
            :error="$errors->has('form.email')" />

        @error('form.email')
            <p class="mt-2 text-sm text-error-600 dark:text-error-500">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <x-flowbite.input-label :for="__('pages/auth/register.attributes.password')" :error="$errors->has('form.password')">
            {{ __('pages/auth/register.password_input.label') }}
        </x-flowbite.input-label>

        <x-flowbite.input wire:model.live.debounce.150ms='form.password' :id="__('pages/auth/register.attributes.password')" :placeholder="__('pages/auth/register.password_input.placeholder')"
            type='password' :error="$errors->has('form.password')" />

        @error('form.password')
            <p class="mt-2 text-sm text-error-600 dark:text-error-500">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <x-flowbite.input-label :for="__('pages/auth/register.attributes.password_confirmation')" wire:change='validatePassword' :error="$errors->has('form.password_confirmation')">
            {{ __('pages/auth/register.password_confirmation_input.label') }}
        </x-flowbite.input-label>

        <x-flowbite.input wire:model.live.debounce.150ms='form.password_confirmation' :id="__('pages/auth/register.attributes.password_confirmation')" type='password'
            :error="$errors->has('form.password_confirmation')" :placeholder="__('pages/auth/register.password_confirmation_input.placeholder')" />

        @error('form.password_confirmation')
            <p class="mt-2 text-sm text-error-600 dark:text-error-500">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <x-flowbite.input-label :for="__('pages/auth/register.attributes.country_id')" :error="$errors->has('form.country_id')">
            {{ __('pages/auth/register.country.label') }}
        </x-flowbite.input-label>

        <x-flowbite.select wire:model.lazy='form.country_id' :id="__('pages/auth/register.attributes.country_id')">

            <option value="-1">{{ __('pages/auth/register.country.placeholder') }}</option>

            @foreach ($countries as $country)
                <option value="{{ $country->id }}" wire:key='{{ $country->id }}'>
                    {{ $country->name }}
                </option>
            @endforeach

        </x-flowbite.select>

        @error('form.country_id')
            <p class="mt-2 text-sm text-error-600 dark:text-error-500">{{ $message }}</p>
        @enderror
    </div>

    <x-flowbite.button wire:submit.prevent='save' wire:loading.attr='disabled'>
        <span wire:loading.remove wire:target='save'> {{ __('pages/auth/register.form_button') }} </span>
        <x-css-spinner wire:loading wire:target='save' class="animate-spin" />
    </x-flowbite.button>

    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
        {{ __('pages/auth/register.form_footer.already_have_an_account') }}

        <x-flowbite.link :href="route('auth.login', ['locale' => app()->getLocale()])">
            {{ __('pages/auth/register.form_footer.login_here') }}
        </x-flowbite.link>
    </p>
</form>
