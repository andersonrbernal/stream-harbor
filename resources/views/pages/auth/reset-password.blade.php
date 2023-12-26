<x-layouts.app :title="$title" class="bg-gray-700 bg-auto bg-no-repeat">

    <img src={{ asset('assets/images/background-image.png') }} alt="Background Image"
        class="absolute -z-50 object-cover w-full h-screen overflow-hidden">

    <div class="max-w-md w-full mx-auto">
        <div class="mx-5">
            <x-favicon-with-title :title="__('pages/auth/register.title')" class="w-48" />
            @livewire('reset-password-user', ['token' => $token, 'user' => $user])
        </div>
    </div>

</x-layouts.app>
