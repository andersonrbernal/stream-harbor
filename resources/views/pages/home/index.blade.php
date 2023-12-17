<x-layouts.app :title="$title">
    <div class="bg-gray-50 dark:bg-gray-900">
        <livewire:trending-video-player :video="$trendingVideo" lazy />
        <livewire:video-section-with-infinite-scroll :videos="$trendingVideos" />
    </div>
</x-layouts.app>
