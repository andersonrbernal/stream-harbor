<x-layouts.app :title="$title" class="bg-gray-700 h-screen bg-auto bg-no-repeat">

    <img src={{ asset('assets/images/background-image.png') }} alt="Background Image" loading="lazy"
        class="absolute -z-50 object-cover w-full h-screen overflow-hidden">

    <div class="max-w-md w-full mx-auto">

        <div class="mx-5">
            <x-favicon-with-title :title="__('pages/auth/forgot-password.app_name')" class="w-48" />
            @livewire('forgot-password-user')
        </div>

    </div>

</x-layouts.app>
