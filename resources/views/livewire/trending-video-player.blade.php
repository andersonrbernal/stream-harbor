<div class="relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-black to-transparent z-10"></div>

    <div class="flex justify-center items-center h-[620px]">
        <div class="relative w-full h-full overflow-hidden">
            <video poster="{{ $video->thumb_url }}" muted loop autoplay
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 min-w-[1670px]">
                <source src="{{ $video->video_url }}" type="video/mp4">
                {{ __('pages/home/video_not_supported') }}
            </video>
        </div>
    </div>

    <div class="absolute text-center inset-0 mx-5 top-1/2 -translate-y-1/2 z-10 sm:text-start sm:left-32">
        <p class="text-primary font-semibold text-2xl mt-4 sm:max-w-sm">
            {{ $video->mediaCategory->name ?? __('components/livewire/trending-video-player.no_category') }}
        </p>

        <h2 class="text-gray-50 font-semibold text-5xl mt-4 sm:max-w-lg">
            {{ $video->title ?? __('components/livewire/trending-video-player.no_title') }}
        </h2>

        <div class="flex items-center justify-center sm:justify-normal gap-5">
            <p class="text-gray-50 font-light mt-4 sm:max-w-md">
                <i class="fa-solid fa-thumbs-up"></i> {{ $video->countLikes() }}
            </p>
            <p class="text-gray-50 font-light mt-4 sm:max-w-md">
                <i class="fa-regular fa-eye"></i> {{ $video->countViews() }}
            </p>
        </div>

        <p class="text-gray-50 font-light mt-4 sm:max-w-md">
            {{ $description ?? __('components/livewire/trending-video-player.no_description') }}
        </p>

        <x-flowbite.button-link :href="route('videos.show', ['id' => $video->id, 'locale' => app()->getLocale()])" :hreflang="app()->getLocale()" class="inline-block w-fit mx-auto mt-4">
            {{ __('components/livewire/trending-video-player.watch_now_button') }}
        </x-flowbite.button-link>
    </div>
</div>
