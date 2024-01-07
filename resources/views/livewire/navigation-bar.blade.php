<nav class="bg-gray-200 dark:bg-gray-800 w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

        <a href="{{ route('index', ['locale' => app()->getLocale()]) }}" hreflang="{{ app()->getLocale() }}"
            class="flex gap-2">
            <img src="{{ asset('favicon.svg') }}" alt="{{ __('pages/auth/register.title') }}" class="w-8 h-8">
            <h1 class="text-lg text-gray-500 md:text-xl dark:text-gray-400">
                {{ __('components/livewire/navigation-bar.title') }}
            </h1>
        </a>

        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">

            <div class="flex items-center gap-4">

                <x-dark-theme-toggle />

                @if ($user)
                    <!-- Avatar button -->
                    <div id="{{ $avatarButtonId }}" type="button" data-dropdown-toggle="{{ $userDropdownId }}"
                        data-dropdown-placement="bottom-start"
                        class="w-10 h-10 rounded-full cursor-pointer relative inline-flex items-center justify-center overflow-hidden bg-gray-100 dark:bg-gray-600">
                        @if ($user->profile_photo)
                            <img class="rounded-full w-10 h-10 object-cover"
                                src="{{ asset('/storage/' . $user->profile_photo) }}" alt="{{ $user->name }}" />
                        @else
                            <span class="font-medium uppercase text-gray-600 dark:text-gray-300">
                                {{ $user->name[0] . $user->name[1] }}
                            </span>
                        @endif
                    </div>

                    <!-- Dropdown menu -->
                    <div id="{{ $userDropdownId }}"
                        class="z-50 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                            <div class="truncate">{{ $user->name }}</div>
                            <div class="font-medium truncate">{{ $user->email }}</div>
                        </div>
                        <div class="py-2">
                            <a href="{{ route('user.profile', ['locale' => app()->getLocale()]) }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                {{ __('components/livewire/navigation-bar.profile') }}
                            </a>
                        </div>
                        <div class="py-2">
                            <a href="{{ route('auth.logout', ['locale' => app()->getLocale()]) }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                {{ __('components/livewire/navigation-bar.logout') }}
                            </a>
                        </div>
                    </div>
                @else
                    <x-flowbite.link :href="route('auth.login', ['locale' => app()->getLocale()])">
                        {{ __('components/livewire/navigation-bar.login_button') }}
                    </x-flowbite.link>
                    <x-flowbite.button-link :href="route('auth.register', ['locale' => app()->getLocale()])">
                        {{ __('components/livewire/navigation-bar.sign_up_button') }}
                    </x-flowbite.button-link>
                @endif

            </div>
        </div>
    </div>
</nav>
