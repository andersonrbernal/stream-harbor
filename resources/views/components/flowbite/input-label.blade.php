@props(['for' => null, 'error' => false])

@php
    $class = 'block mb-2 text-sm font-medium text-gray-500 dark:text-gray-400';

    if ($error) {
        $class = $class . ' text-error-700 dark:text-error-500';
    }
@endphp

<label {{ $attributes->merge(['class' => $class, 'for' => $for]) }}>
    {{ $slot }}
</label>
