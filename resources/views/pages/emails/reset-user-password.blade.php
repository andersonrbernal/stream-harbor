<x-layouts.email :title="$title">
    <div class="max-w-xl mx-auto bg-gray-100 p-5">
        <p class="text-primary-800 text-center">{{ __('Stream Harbor') }}</p>

        <div class="my-4">
            <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 dark:text-white">
                {{ __('mails/reset-user-password.title') }}
            </h1>

            <h3 class="mt-4 text-lg">
                {!! __('mails/reset-user-password.presentation', [
                    'name' => '<span class="font-semibold">' . $name . '</span>',
                ]) !!}
            </h3>

            <p>{!! __('mails/reset-user-password.your_requested_a_password_reset_to_email', [
                'email' => '<span class="font-semibold">' . $email . '</span>',
            ]) !!}</p>

            <div class="my-6 text-center">
                <a href="{{ route('auth.reset-password', ['token' => $token, 'email' => $email, 'locale' => app()->getLocale()]) }}"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    {{ __('mails/reset-user-password.button') }}
                </a>
            </div>

            <p class="mt-4 text-sm">
                {{ __('mails/reset-user-password.if_youre_having_trouble_clicking_the_button', ['actionText' => __('mails/reset-user-password.button')]) }}
                <a href="{{ route('auth.reset-password', ['token' => $token, 'email' => $email, 'locale' => app()->getLocale()]) }}"
                    class="text-blue-700 hover:text-blue-800 underline">
                    {{ route('auth.reset-password', ['token' => $token, 'email' => $email, 'locale' => app()->getLocale()]) }}
                </a>
            </p>

            <p class="mt-4">
                <span>{{ __('mails/reset-user-password.not_requested_password_reset') }}</span>
                <span>{!! __('mails/reset-user-password.token_expiration', [
                    'count' =>
                        '<span class="font-semibold">' .
                        config('auth.passwords.' . config('auth.defaults.passwords') . '.expire') .
                        '</span>',
                ]) !!}</span>
            </p>

            <p class="mt-4">{!! __('mails/reset-user-password.regards', [
                'team' => '<span class="font-semibold">' . config('app.name') . '</span>',
            ]) !!}</p>
        </div>
    </div>
</x-layouts.email>
