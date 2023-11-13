@props(['title'])

<div {{ $attributes->merge(['class' => 'flex items-center justify-center mx-auto']) }}>
    <img src="{{ asset('favicon.svg') }}" alt="{{ __('pages/auth/register.title') }}"
        class="mx-auto my-5 drop-shadow-[0_5px_5px_rgba(0,0,0,0.5)]">
    <h3 class="text-white font-semibold text-xl drop-shadow-[0_5px_5px_rgba(0,0,0,1)]">
        {{ $title }}
    </h3>
</div>
