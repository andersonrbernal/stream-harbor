<div class="max-w-7xl mx-auto px-4 py-8">
    <h2 class="text-2xl font-extrabold dark:text-white mb-5">
        {{ __('pages/home/index.home.index.trending_videos') }}
    </h2>

    <ul class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mb-5">
        @foreach ($videos as $video)
            <li>
                <livewire:video-card :id="$video->id" wire:key="{{ $video->id }}" lazy />
            </li>
        @endforeach
    </ul>
    <div x-intersect='$wire.loadMore()'></div>
    <div class="mx-auto flex justify-center">
        <span wire:loading>
            <i class="fa-solid fa-circle-notch text-2xl text-primary animate-spin"></i>
            <span class="sr-only">{{ __('states.loading') }}</span>
        </span>
    </div>
</div>
