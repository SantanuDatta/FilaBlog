<header class="z-50 flex w-11/12 flex-wrap text-sm md:flex-nowrap md:justify-start mx-auto">
    <nav
        class="relative mx-2 mt-6 w-full max-w-[85rem] justify-between rounded-[36px] border border-gray-200 bg-white px-4 py-2 dark:border-neutral-700 dark:bg-neutral-800 md:flex md:items-center md:justify-between md:px-6 md:py-0 lg:px-8 xl:mx-auto"
        aria-label="Global"
    >
        <div class="flex items-center justify-between">
            <x-nav.hbrand>FilaBlog</x-nav.hbrand>
            <div class="md:hidden">
                <button
                    class="hs-collapse-toggle size-8 flex items-center justify-center rounded-full border border-gray-200 text-sm font-semibold text-gray-800 hover:bg-gray-100 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700"
                    data-hs-collapse="#navbar-collapse-with-animation"
                    type="button"
                    aria-controls="navbar-collapse-with-animation"
                    aria-label="Toggle navigation"
                >
                    <svg
                        class="size-4 flex-shrink-0 hs-collapse-open:hidden"
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
                        <line
                            x1="3"
                            x2="21"
                            y1="6"
                            y2="6"
                        />
                        <line
                            x1="3"
                            x2="21"
                            y1="12"
                            y2="12"
                        />
                        <line
                            x1="3"
                            x2="21"
                            y1="18"
                            y2="18"
                        />
                    </svg>
                    <svg
                        class="size-4 hidden flex-shrink-0 hs-collapse-open:block"
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
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <div
            class="hs-collapse hidden grow basis-full overflow-hidden transition-all duration-300 md:block"
            id="navbar-collapse-with-animation"
        >
            <div class="flex flex-col py-2 md:flex-row md:items-center md:justify-end md:py-0 md:ps-7">
                <x-nav.link
                    href="/"
                    :active="request()->is('/')"
                >Landing</x-nav.link>
                <x-nav.link
                    href="/"
                    :active="request()->is('/')"
                >Account</x-nav.link>
                <x-nav.link
                    href="/"
                    :active="request()->is('/')"
                >Work</x-nav.link>
                <x-nav.link
                    href="/"
                    :active="request()->is('/')"
                >Blog</x-nav.link>

                <x-dropdown>
                    <x-slot:name>Dropwown</x-slot:name>
                    <x-nav.link
                        href="/"
                        :drop="true"
                        :active="request()->is('/')"
                    >Landing</x-nav.link>
                    <x-nav.link
                        href="/"
                        :drop="true"
                        :active="request()->is('/')"
                    >Account</x-nav.link>
                    <x-nav.link
                        href="/"
                        :drop="true"
                        :active="request()->is('/')"
                    >Work</x-nav.link>
                </x-dropdown>

                <x-nav.log
                    href="#"
                    :first="true"
                >Login</x-nav.log>
                <x-nav.log href="#">Register</x-nav.log>
            </div>
        </div>
    </nav>
</header>
