@props(['heading'])

@php
    $class = 'text-gray-900 dark:text-gray-50';
@endphp

@if ($heading === 'h1')
    <h1 {{ $attributes->merge(['class' => $class]) }}>{{ $slot }}</h1>
@elseif ($heading === 'h2')
    <h2 {{ $attributes->merge(['class' => $class]) }}>{{ $slot }}</h2>
@elseif ($heading === 'h3')
    <h3 {{ $attributes->merge(['class' => $class]) }}>{{ $slot }}</h3>
@elseif ($heading === 'h4')
    <h4 {{ $attributes->merge(['class' => $class]) }}>{{ $slot }}</h4>
@elseif ($heading === 'h5')
    <h5 {{ $attributes->merge(['class' => $class]) }}>{{ $slot }}</h5>
@elseif ($heading === 'h6')
    <h6 {{ $attributes->merge(['class' => $class]) }}>{{ $slot }}</h6>
@endif
