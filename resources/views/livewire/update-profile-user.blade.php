<form class="max-w-7xl px-5 mx-auto" wire:submit='updateProfile'>
    <div class="space-y-6">
        <div class="border-b border-gray-900/10 py-6 grid grid-cols-6 gap-x-5">
            <div class="col-span-full md:col-span-2 pb-4">
                <h2 class="text-base font-semibold leading-7 dark:text-white">
                    {{ __('components/livewire/update-profile-user.title') }}
                </h2>
                <p class="mt-1 text-sm leading-6 dark:text-gray-200">
                    {{ __('components/livewire/update-profile-user.profile_data_share_warning') }}
                </p>
            </div>

            <div class="grid grid-cols-1 gap-x-6 gap-y-8 col-span-full md:col-span-4">
                {{-- Name Input --}}
                <div class="sm:col-span-4">
                    <x-flowbite.input-label :for="__('components/livewire/update-profile-user.attributes.name')" :error="$errors->has('form.name')">
                        {{ __('components/livewire/update-profile-user.name_input.label') }}
                    </x-flowbite.input-label>

                    <x-flowbite.input wire:model.live.debounce.150ms='form.name' :id="__('components/livewire/update-profile-user.attributes.name')" :placeholder="__('components/livewire/update-profile-user.name_input.placeholder')"
                        :error="$errors->has('form.name')" class="max-w-sm" />

                    @error('form.name')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email Input --}}
                <div class="sm:col-span-4">
                    <x-flowbite.input-label :for="__('components/livewire/update-profile-user.attributes.email')" :error="$errors->has('form.email')">
                        {{ __('components/livewire/update-profile-user.email_input.label') }}
                    </x-flowbite.input-label>

                    <x-flowbite.input wire:model.live.debounce.150ms='form.email' :id="__('components/livewire/update-profile-user.attributes.email')" :placeholder="__('components/livewire/update-profile-user.email_input.placeholder')"
                        :error="$errors->has('form.email')" class="max-w-sm" />

                    @error('form.email')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- File Upload Input --}}
                <div class="sm:col-span-4">
                    <label for="{{ __('components/livewire/update-profile-user.attributes.profile_photo') }}"
                        wire:loading.class='animate-pulse'
                        class="flex flex-col items-center justify-center w-full h-64 border-2 rounded-lg cursor-pointer border-dashed max-w-sm
                            @if ($errors->has('form.profile_photo')) border-red-500 bg-red-50 hover:bg-red-100 dark:bg-red-700 dark:border-red-600 dark:hover:border-red-500 dark:hover:bg-red-600 dark:bg-opacity-5 dark:hover:bg-opacity-10
                            @else
                            border-gray-300 bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600
                            @enderror">

                            @if ($form->profile_photo)
                                <img src="{{ $form->profile_photo->temporaryUrl() }}" alt="{{ __('components/livewire/update-profile-user.photo') }}"
                                    class="w-full h-full rounded-lg object-contain" />
                            @elseif ($user->profile_photo)
                                <img src="{{ asset('/storage/' . $user->profile_photo) }}" alt="{{ __('components/livewire/update-profile-user.photo') }}"
                                    class="w-full h-full rounded-lg object-contain" />
                            @else
                                <div class="flex flex-col items-center justify-center pt-5 pb-6 px-2">
                                    <i class="fa-solid fa-cloud-arrow-up fa-xl m-3 text-gray-500 dark:text-gray-400"
                                        wire:loading.remove='form.profile_photo'></i>
                                    <i wire:loading='form.profile_photo'
                                        class="fa-solid fa-spinner animate-spin text-lg text-gray-500 dark:text-gray-400"></i>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400 font-semibold">
                                        {{ __('components/livewire/update-profile-user.profile_photo_input.label') }}
                                    <p class="text-xs text-center text-gray-500 dark:text-gray-400">
                                        {{ __('components/livewire/update-profile-user.profile_photo_input.description', ['values' => implode(', ', $form->profile_photo_allowed_extensions)]) }}
                                    </p>
                                </div> @endif

                            <input wire:model.live='form.profile_photo' id="{{ __('components/livewire/update-profile-user.attributes.profile_photo') }}"
                        type="file" class="hidden" wire:error.class='display'
                        accept="{{ $profile_photo_allowed_extensions }}" />
                    </label>

                    @error('form.profile_photo')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Country Select --}}
                <div class="sm:col-span-4">
                    <x-flowbite.input-label :for="__('components/livewire/update-profile-user.attributes.country_select')" :error="$errors->has('form.country_id')">
                        {{ __('components/livewire/update-profile-user.country_select.label') }}
                    </x-flowbite.input-label>

                    <x-flowbite.select wire:model.blur='form.country_id' :id="__('components/livewire/update-profile-user.attributes.country_select')" class="max-w-sm">

                        <option value="-1">{{ __('components/livewire/update-profile-user.country.placeholder') }}
                        </option>

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

                <x-flowbite.button wire:click.prevent='updateProfile' wire:loading.attr='disabled' class="max-w-sm">

                    <span wire:loading.remove wire:target='updateProfile'>
                        @if (session()->has('success'))
                            {{ session('success') }}
                        @elseif (session()->has('error'))
                            {{ session('error') }}
                        @else
                            {{ __('components/livewire/update-profile-user.update_profile_button') }}
                        @endif
                    </span>

                    <i wire:loading wire:target='updateProfile'
                        class="fa-solid fa-spinner animate-spin text-lg text-primary-200"></i>

                </x-flowbite.button>
            </div>
        </div>
    </div>
</form>
