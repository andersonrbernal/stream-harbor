<form wire:submit.prevent='save'
    class="p-8 space-y-4 md:space-y-6 border border-gray-200 rounded-lg shadow bg-gray-100 dark:bg-gray-800 dark:border-gray-700">

    <h1 class="font-semibold text-xl text-gray-500 dark:text-gray-400">
        {{ __('pages/auth/register.form_title') }}
    </h1>

    @if (session()->has('message'))
        <x-flowbite.alert type="error">
            {{ session('message') }}
        </x-flowbite.alert>
    @endif

    @csrf

    <div>
        <x-flowbite.input-label :for="__('pages/auth/register.attributes.name')" :error="$errors->has('form.name')">
            {{ __('pages/auth/register.name_input.label') }}
        </x-flowbite.input-label>

        <x-flowbite.input wire:model.live.debounce.150ms='form.name' :id="__('pages/auth/register.attributes.name')" :placeholder="__('pages/auth/register.name_input.placeholder')"
            :error="$errors->has('form.name')" />

        @error('form.name')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <x-flowbite.input-label :for="__('pages/auth/register.attributes.email')" :error="$errors->has('form.email')">
            {{ __('pages/auth/register.email_input.label') }}
        </x-flowbite.input-label>

        <x-flowbite.input wire:model.live.debounce.150ms='form.email' :id="__('pages/auth/register.attributes.email')" :placeholder="__('pages/auth/register.email_input.placeholder')"
            :error="$errors->has('form.email')" />

        @error('form.email')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <x-flowbite.input-label :for="__('pages/auth/register.attributes.password')" :error="$errors->has('form.password')">
            {{ __('pages/auth/register.password_input.label') }}
        </x-flowbite.input-label>

        <x-flowbite.input wire:model.live.debounce.150ms='form.password' :id="__('pages/auth/register.attributes.password')" :placeholder="__('pages/auth/register.password_input.placeholder')"
            type='password' :error="$errors->has('form.password')" />

        @error('form.password')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <x-flowbite.input-label :for="__('pages/auth/register.attributes.password_confirmation')" wire:change='validatePassword' :error="$errors->has('form.password_confirmation')">
            {{ __('pages/auth/register.password_confirmation_input.label') }}
        </x-flowbite.input-label>

        <x-flowbite.input wire:model.live.debounce.150ms='form.password_confirmation' :id="__('pages/auth/register.attributes.password_confirmation')" type='password'
            :error="$errors->has('form.password_confirmation')" :placeholder="__('pages/auth/register.password_confirmation_input.placeholder')" />

        @error('form.password_confirmation')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
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
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <x-flowbite.button wire:submit.prevent='save' wire:loading.attr='disabled'>
        <span wire:loading.remove wire:target='save'> {{ __('pages/auth/register.form_button') }} </span>
        <i wire:loading wire:target='save' class="fa-solid fa-spinner animate-spin text-lg text-primary-200"></i>
    </x-flowbite.button>

    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
        {{ __('pages/auth/register.form_footer.already_have_an_account') }}

        <x-flowbite.link :href="route('auth.login', ['locale' => app()->getLocale()])">
            {{ __('pages/auth/register.form_footer.login_here') }}
        </x-flowbite.link>
    </p>
</form>
