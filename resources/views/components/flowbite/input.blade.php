@props(['error' => false])

@php
    $baseClass = 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500';
    $errorClass = 'bg-error-50 border border-error-500 text-error-900 placeholder-error-700 text-sm rounded-lg focus:ring-error-500 dark:bg-gray-700 focus:border-error-500 block w-full p-2.5 dark:text-error-500 dark:placeholder-error-500 dark:border-error-500';
@endphp

<input {{ $attributes->merge(['class' => $error ? $errorClass : $baseClass]) }} />
