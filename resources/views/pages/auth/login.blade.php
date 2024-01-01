<x-layouts.app
    class="bg-gray-700 bg-no-repeat bg-fixed bg-center bg-cover scroll-smooth
    bg-[url('{{ asset('assets/images/background-image.png') }}')]">

    <div class="max-w-md w-full mx-auto">
        <div class="mx-5">
            <x-favicon-with-title :title="__('pages/auth/login.title')" class="w-48" />
            @livewire('login-user')
        </div>
    </div>

</x-layouts.app>
