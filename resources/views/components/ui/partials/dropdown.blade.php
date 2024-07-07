@props(['title'])

<div
    x-data="{
        open: false,
        timer: null,
        clearTimer() {
            clearTimeout(this.timer);
        },
        startTimer() {
            this.timer = setTimeout(() => {
                this.open = false;
            }, 100);
        }
    }"
    x-on:mouseleave="startTimer()"
    x-on:mouseenter="clearTimer()"
>
    <x-ui.partials.links
        class="flex items-center gap-x-1"
        type="button"
        href="#"
        aria-expanded="false"
        x-on:mouseenter="open = true; clearTimer();"
    >
        {{ $title }} <x-icons.chevron-up />
    </x-ui.partials.links>

    <div
        class="absolute mt-3 w-56 rounded-xl bg-slate-100 p-2 shadow-lg ring-1 ring-slate-800/5 dark:bg-slate-700"
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-1"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-1"
        x-on:mouseenter="clearTimer()"
        x-on:mouseleave="startTimer()"
    >
        {{ $slot }}
    </div>
</div>
