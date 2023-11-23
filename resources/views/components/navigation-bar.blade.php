<nav class="bg-gray-200 dark:bg-gray-800 w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

        <a href="{{ route('index', ['locale' => app()->getLocale()]) }}" hreflang="{{ app()->getLocale() }}"
            class="flex gap-2">
            <img src="{{ asset('favicon.svg') }}" alt="{{ __('pages/auth/register.title') }}" class="w-8 h-8">
            <h1 class="text-lg text-gray-500 md:text-xl dark:text-gray-400">
                {{ __('components/navigation-bar.title') }}
            </h1>
        </a>

        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">

            <div class="flex items-center gap-4">

                <x-dark-theme-toggle />

                @if ($user)
                    @php $firstName = explode(' ', trim($user->name))[0]; @endphp

                    <x-flowbite.heading heading="h4"> {{ $firstName }} </x-flowbite.heading>
                @else
                    <x-flowbite.link :href="route('auth.login', ['locale' => app()->getLocale()])">
                        {{ __('components/navigation-bar.login_button') }}
                    </x-flowbite.link>
                    <x-flowbite.button-link :href="route('auth.register', ['locale' => app()->getLocale()])">
                        {{ __('components/navigation-bar.sign_up_button') }}
                    </x-flowbite.button-link>
                @endif

            </div>
        </div>
    </div>
</nav>
