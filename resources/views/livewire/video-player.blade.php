<div class="max-w-7xl mx-auto px-5">
    <div wire:click='view' @unless (auth()->check()) onclick="event.preventDefault();" @endunless>
        <video poster="{{ $video->thumb_url }}" controls class="w-full">
            <source src="{{ $video->video_url }}" type="video/mp4">
            {{ __('pages/home/video_not_supported') }}
        </video>
    </div>

    <div class="my-6 max-w-xl">
        <h1 class="text-3xl my-1 font-bold dark:text-gray-50">{{ $video->title }}</h1>
        <p class="dark:text-gray-50">{{ $video->description }}</p>
        <div class="flex gap-3">
            <a wire:click='likeOrDislike' class="cursor-pointer"
                @unless (auth()->check()) onclick="event.preventDefault();" @endunless>
                @if (auth()->check() && $video->isLikedByUser(auth()->user()->id))
                    <button type="button" class="text-gray-700 dark:text-gray-50">
                        <i class="fa-solid fa-thumbs-up text-primary"></i>
                        <span class="sr-only">{{ __('pages/videos/show.likes') }}</span>
                        {{ $video->countLikes() }}
                    </button>
                @else
                    <button type="button" class="text-gray-700 dark:text-gray-50">
                        <i class="fa-solid fa-thumbs-up"></i>
                        <span class="sr-only">{{ __('pages/videos/show.views') }}</span>
                        {{ $video->countLikes() }}
                    </button>
                @endif
            </a>

            <p class="text-gray-700 dark:text-gray-50">
                <i class="fa-solid fa-eye"></i>
                {{ $video->countViews() }}
            </p>
        </div>
        <x-flowbite.button-link href="{{ url()->route('index', ['locale' => app()->getLocale()]) }}"
            class="block mt-2 w-fit">
            {{ __('pages/videos/show.back_button') }}
        </x-flowbite.button-link>
    </div>
</div>
