<!-- Slider -->
<div
    class="relative"
    data-hs-carousel='{
            "loadingClasses": "opacity-0",
            "isAutoPlay": true
        }'
>
    <div class="hs-carousel min-h-96 relative w-full overflow-hidden rounded-lg bg-white">
        <div
            class="hs-carousel-body absolute bottom-0 start-0 top-0 flex flex-nowrap opacity-0 transition-transform duration-700">
            <div class="hs-carousel-slide">
                <div class="flex h-full justify-center bg-gray-100 p-6 dark:bg-neutral-500">
                    <span class="self-center text-4xl text-gray-800 transition duration-700 dark:text-white">First
                        slide</span>
                </div>
            </div>
            <div class="hs-carousel-slide">
                <div class="flex h-full justify-center bg-gray-200 p-6 dark:bg-neutral-800">
                    <span class="self-center text-4xl text-gray-800 transition duration-700 dark:text-white">Second
                        slide</span>
                </div>
            </div>
            <div class="hs-carousel-slide">
                <div class="flex h-full justify-center bg-gray-300 p-6 dark:bg-neutral-700">
                    <span class="self-center text-4xl text-gray-800 transition duration-700 dark:text-white">Third
                        slide</span>
                </div>
            </div>
        </div>
    </div>

    <button
        class="hs-carousel-prev hs-carousel:disabled:opacity-50 absolute inset-y-0 start-0 inline-flex h-full w-[46px] items-center justify-center rounded-s-lg text-gray-800 hover:bg-gray-800/10 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10"
        type="button"
    >
        <span
            class="text-2xl"
            aria-hidden="true"
        >
            <svg
                class="size-5 flex-shrink-0"
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
            >
                <path d="m15 18-6-6 6-6"></path>
            </svg>
        </span>
        <span class="sr-only">Previous</span>
    </button>
    <button
        class="hs-carousel-next hs-carousel:disabled:opacity-50 absolute inset-y-0 end-0 inline-flex h-full w-[46px] items-center justify-center rounded-e-lg text-gray-800 hover:bg-gray-800/10 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10"
        type="button"
    >
        <span class="sr-only">Next</span>
        <span
            class="text-2xl"
            aria-hidden="true"
        >
            <svg
                class="size-5 flex-shrink-0"
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
            >
                <path d="m9 18 6-6-6-6"></path>
            </svg>
        </span>
    </button>

    <div class="hs-carousel-pagination absolute bottom-3 end-0 start-0 flex justify-center space-x-2">
        <span
            class="size-3 cursor-pointer rounded-full border border-gray-400 hs-carousel-active:border-blue-700 hs-carousel-active:bg-blue-700 dark:border-neutral-600 dark:hs-carousel-active:border-blue-500 dark:hs-carousel-active:bg-blue-500"
        ></span>
        <span
            class="size-3 cursor-pointer rounded-full border border-gray-400 hs-carousel-active:border-blue-700 hs-carousel-active:bg-blue-700 dark:border-neutral-600 dark:hs-carousel-active:border-blue-500 dark:hs-carousel-active:bg-blue-500"
        ></span>
        <span
            class="size-3 cursor-pointer rounded-full border border-gray-400 hs-carousel-active:border-blue-700 hs-carousel-active:bg-blue-700 dark:border-neutral-600 dark:hs-carousel-active:border-blue-500 dark:hs-carousel-active:bg-blue-500"
        ></span>
    </div>
</div>
<!-- End Slider -->
