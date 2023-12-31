<x-layouts.app class="bg-gray-700 h-screen bg-auto bg-no-repeat">

    <img src={{ asset('assets/images/background-image.png') }} alt="Background Image" loading="lazy"
        class="absolute -z-50 object-cover w-full h-screen overflow-hidden">

    <div class="max-w-md w-full mx-auto">

        <div class="mx-5">
            <x-favicon-with-title :title="__('pages/auth/login.title')" class="w-48" />
            @livewire('login-user')
        </div>

    </div>

</x-layouts.app>
