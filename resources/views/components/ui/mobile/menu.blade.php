<div
    class="lg:hidden"
    x-show="open"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="translate-x-full"
    x-transition:enter-end="translate-x-0"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="translate-x-full"
>
    <div class="fixed inset-0 z-10" x-on:click.away="open = false"></div>
    <div
        class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-slate-100 px-6 py-6 dark:bg-slate-700 sm:max-w-sm sm:ring-1 sm:ring-slate-900/10">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-between">
                <x-ui.partials.logo
                    src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                    href="#"
                    alt="Your Company"
                />
            </div>
            <button
                class="-m-2.5 rounded-md p-2.5 text-slate-800 dark:text-slate-100"
                type="button"
                x-on:click="open = false"
            >
                <span class="sr-only">Close menu</span>
                <x-icons.hamburger-close />
            </button>
        </div>
        <div class="mt-6 flow-root">
            <div class="-my-6">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
