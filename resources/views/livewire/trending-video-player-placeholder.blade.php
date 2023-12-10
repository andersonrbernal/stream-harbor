<div class="relative overflow-hidden">
    <div class="flex justify-center items-center h-[620px]">
        <div class="relative w-full h-full overflow-hidden">
            <div role="status"
                class="flex items-center justify-center h-full w-full bg-gray-500 animate-pulse dark:bg-gray-900">
                <svg class="w-20 h-20 text-gray-300 dark:text-gray-600" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                    <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z" />
                    <path
                        d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM9 13a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2Zm4 .382a1 1 0 0 1-1.447.894L10 13v-2l1.553-1.276a1 1 0 0 1 1.447.894v2.764Z" />
                </svg>
                <span class="sr-only">{{ __('states.loading') }}</span>
            </div>
        </div>
    </div>

    <div class="absolute text-center inset-0 mx-5 top-1/2 -translate-y-1/2 z-10 sm:text-start sm:left-32">
        {{-- Category --}}
        <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-28 mb-4 mx-auto sm:mx-0"></div>

        {{-- Title --}}
        <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-48 mb-4 mx-auto sm:mx-0"></div>

        {{-- Statistics --}}
        <div class="flex items-center justify-center sm:justify-normal gap-5 text-gray-200 dark:text-gray-400">
            <i class="fa-solid fa-thumbs-up"></i>
            <i class="fa-regular fa-eye"></i>
        </div>

        {{-- Description --}}
        <div role="status" class="space-y-2.5 animate-pulse max-w-lg mt-4">
            <div class="flex items-center w-full">
                <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-32"></div>
                <div class="h-2.5 ms-2 bg-gray-500 rounded-full dark:bg-gray-600 w-24"></div>
                <div class="h-2.5 ms-2 bg-gray-500 rounded-full dark:bg-gray-600 w-full"></div>
            </div>
            <div class="flex items-center w-full max-w-[480px]">
                <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-700 w-full"></div>
                <div class="h-2.5 ms-2 bg-gray-500 rounded-full dark:bg-gray-600 w-full"></div>
                <div class="h-2.5 ms-2 bg-gray-500 rounded-full dark:bg-gray-600 w-24"></div>
            </div>
            <div class="flex items-center w-full max-w-[400px]">
                <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-full"></div>
                <div class="h-2.5 ms-2 bg-gray-300 rounded-full dark:bg-gray-700 w-80"></div>
                <div class="h-2.5 ms-2 bg-gray-500 rounded-full dark:bg-gray-600 w-full"></div>
            </div>
            <div class="flex items-center w-full max-w-[480px]">
                <div class="h-2.5 ms-2 bg-gray-300 rounded-full dark:bg-gray-700 w-full"></div>
                <div class="h-2.5 ms-2 bg-gray-500 rounded-full dark:bg-gray-600 w-full"></div>
                <div class="h-2.5 ms-2 bg-gray-500 rounded-full dark:bg-gray-600 w-24"></div>
            </div>
            <div class="flex items-center w-full max-w-[440px]">
                <div class="h-2.5 ms-2 bg-gray-500 rounded-full dark:bg-gray-600 w-32"></div>
                <div class="h-2.5 ms-2 bg-gray-500 rounded-full dark:bg-gray-600 w-24"></div>
                <div class="h-2.5 ms-2 bg-gray-300 rounded-full dark:bg-gray-700 w-full"></div>
            </div>
            <div class="flex items-center w-full max-w-[360px]">
                <div class="h-2.5 ms-2 bg-gray-500 rounded-full dark:bg-gray-600 w-full"></div>
                <div class="h-2.5 ms-2 bg-gray-300 rounded-full dark:bg-gray-700 w-80"></div>
                <div class="h-2.5 ms-2 bg-gray-500 rounded-full dark:bg-gray-600 w-full"></div>
            </div>
            <span class="sr-only">{{ __('states.loading') }}</span>
        </div>

        {{-- Watch Now --}}
        <x-flowbite.button type="button" disabled class="w-min mt-4">
            <span class="flex items-center gap-2">
                <i class="fa-solid fa-circle-notch text-lg animate-spin"></i> {{ __('states.loading') }}
            </span>
        </x-flowbite.button>
    </div>
</div>
