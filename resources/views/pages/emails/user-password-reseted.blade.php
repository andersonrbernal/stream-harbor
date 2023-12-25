<x-layouts.email :title="$title">
    <div class="max-w-xl mx-auto bg-gray-100 p-5">
        <p class="text-primary-800 text-center">{{ __('Stream Harbor') }}</p>

        <div class="my-4">
            <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 dark:text-white">
                {{ __('mails/user-password-reseted.title', ['email' => $email]) }}
            </h1>

            <h3 class="mt-4 text-lg">
                {!! __('mails/user-password-reseted.presentation', [
                    'name' => '<span class="font-semibold">' . $name . '</span>',
                ]) !!}
            </h3>

            <p class="mt-4">
                {{ __('mails/user-password-reseted.message') }}
            </p>

            <p class="mt-4">{!! __('mails/user-password-reseted.regards', [
                'team' => '<span class="font-semibold">' . config('app.name') . '</span>',
            ]) !!}</p>
        </div>
    </div>
</x-layouts.email>
