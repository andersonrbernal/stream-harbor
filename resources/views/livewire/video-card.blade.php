<div>
    <a href="{{ route('videos.show', ['id' => $id, 'locale' => app()->getLocale()]) }}"
        class="w-full bg-white shadow hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700">
        <div class="h-48 overflow-hidden rounded-lg">
            <img src="{{ $video->thumb_url }}" alt="{{ $video->title }}" loading="lazy" class="mb-4 w-full object-cover">
        </div>

    </a>
    <h3 class="mb-4 font-extrabold leading-none tracking-tight text-gray-900 dark:text-white mt-2">
        {{ $video->title }}
    </h3>
</div>
