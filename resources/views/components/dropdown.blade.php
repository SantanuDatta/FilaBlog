<div
    class="hs-dropdown py-3 ps-px [--adaptive:none] [--strategy:static] md:[--strategy:fixed] md:[--trigger:hover]">
    <button
        class="flex w-full items-center font-medium text-gray-500 hover:text-gray-400 dark:text-white dark:hover:text-blue-500 dark:hover:bg-neutral-700 py-2 px-2 rounded-lg mx-1"
        type="button"
    >
        {{ $name }}
        <svg
            class="size-4 ms-2"
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
            <path d="m6 9 6 6 6-6" />
        </svg>
    </button>

    <div
        class="hs-dropdown-menu top-full z-10 hidden rounded-lg bg-white p-2 opacity-0 transition-[opacity,margin] duration-[0.1ms] before:absolute before:-top-5 before:start-0 before:h-5 before:w-full hs-dropdown-open:opacity-100 dark:divide-neutral-700 dark:border-neutral-700 dark:bg-neutral-800 md:w-48 md:border md:shadow-md md:duration-[150ms] md:dark:border">
        {{ $slot }}
    </div>
</div>
