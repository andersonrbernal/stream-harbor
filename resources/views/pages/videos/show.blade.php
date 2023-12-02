<x-layouts.app :title="$title">
    <main class="bg-gray-50 dark:bg-gray-700 pb-2">
        @livewire('video-player', ['video' => $video])
    </main>
</x-layouts.app>
