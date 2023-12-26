@props(['type' => 'default'])

@switch($type)
    @case('success')
        <div {{ $attributes->merge(['class' => 'flex gap-2 items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-700 dark:text-green-400']) }}
            role="alert">
            <i class="fa-solid fa-circle-info"></i>
            <span class="sr-only">{{ __('states.success') }}</span>
            <div>
                {{ $slot }}
            </div>
        </div>
    @break

    @case('warning')
        <div {{ $attributes->merge(['class' => 'flex gap-2 items-center p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-700 dark:text-yellow-400']) }}
            role="alert">
            <i class="fa-solid fa-circle-info"></i>
            <span class="sr-only">{{ __('states.info') }}</span>
            <div>
                {{ $slot }}
            </div>
        </div>
    @break

    @case('error')
        <div {{ $attributes->merge(['class' => 'flex gap-2 items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-700 dark:text-red-400']) }}
            role="alert">
            <i class="fa-solid fa-circle-info"></i>
            <span class="sr-only">{{ __('states.info') }}</span>
            <div>
                {{ $slot }}
            </div>
        </div>
    @break

    @case('info')
        <div {{ $attributes->merge(['class' => 'flex gap-2 items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-700 dark:text-blue-400']) }}
            role="alert">
            <i class="fa-solid fa-circle-info"></i>
            <span class="sr-only">{{ __('states.info') }}</span>
            <div>
                {{ $slot }}
            </div>
        </div>
    @break

    @default
        <div {{ $attributes->merge(['class' => 'flex gap-2 items-center p-4 mb-4 text-sm text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-gray-400']) }}
            role="alert">
            <i class="fa-solid fa-circle-info"></i>
            <span class="sr-only">{{ __('states.info') }}</span>
            <div>
                {{ $slot }}
            </div>
        </div>
@endswitch
