<x-layouts.app :title="$title">
    <div class="dark:bg-gray-800 dark:text-white">
        @livewire('update-profile-user', ['user' => auth()->user()])
    </div>
</x-layouts.app>
