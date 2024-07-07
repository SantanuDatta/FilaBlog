@props(['title'])

<div
    class="-mx-3"
    x-data="{ open: false }"
>
    <button
        class="flex w-full items-center justify-between rounded-lg py-2 pl-3 pr-3.5 text-base font-semibold leading-7 hover:bg-slate-500 dark:hover:bg-slate-300 text-slate-700 dark:text-slate-100"
        type="button"
        x-on:click.stop="open = !open"
        x-bind:aria-expanded="open"
    >
        {{ $title }} <x-icons.mobile-chevron-up x-bind:class="{ 'rotate-180': open }"/>
    </button>
    <div
        class="mt-2 space-y-2"
        x-show="open"
        x-on:click.stop=""
        x-transition:enter="transition ease-out duration-400"
        x-transition:enter-start="opacity-0 translate-y-1"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-400"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-1"
    >
        {{ $slot }}
    </div>
</div>
