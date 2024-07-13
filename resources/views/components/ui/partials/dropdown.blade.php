@props(['title', 'mobile' => false])

<div
    class="{{ $mobile ? '-mx-3' : '' }}"
    x-data="{
        open: false,
        timer: null,
        clearTimer() {
            if (!{{ $mobile ? 'true' : 'false' }}) clearTimeout(this.timer);
        },
        startTimer() {
            if (!{{ $mobile ? 'true' : 'false' }}) {
                this.timer = setTimeout(() => {
                    this.open = false;
                }, 100);
            }
        }
    }"
    x-on:mouseleave="startTimer()"
    x-on:mouseenter="clearTimer()"
>
    @if ($mobile)
        <button
            class="flex w-full items-center justify-between rounded-lg py-2 pl-3 pr-3.5 text-base font-bold leading-7 text-slate-800 hover:bg-slate-500 dark:text-slate-100 dark:hover:bg-slate-300"
            type="button"
            x-on:click.stop="open = !open"
            x-bind:aria-expanded="open"
        >
            {{ $title }} <x-icons.chevron-up mobile />
        </button>
    @else
        <x-ui.partials.links
            class="flex items-center gap-x-1"
            type="button"
            href="#"
            x-bind:aria-expanded="open"
            x-on:mouseenter="open = true; clearTimer();"
        >
            {{ $title }} <x-icons.chevron-up />
        </x-ui.partials.links>
    @endif

    <div
        class="{{ $mobile ? 'mt-2 space-y-2' : 'absolute mt-3 w-56 rounded-xl bg-slate-100 p-2 shadow-lg ring-1 ring-slate-800/5 dark:bg-slate-700' }}"
        x-show="open"
        x-on:click.stop=""
        x-transition:enter="transition ease-out duration-{{ $mobile ? '400' : '200' }}"
        x-transition:enter-start="opacity-0 translate-y-1"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-{{ $mobile ? '400' : '150' }}"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-1"
        {{ !$mobile ? 'x-on:mouseenter="clearTimer()" x-on:mouseleave="startTimer()"' : '' }}
    >
        {{ $slot }}
    </div>
</div>
