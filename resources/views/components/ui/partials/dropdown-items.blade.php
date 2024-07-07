@props(['href'])

<a
    class="block rounded-lg px-3 py-2 text-sm font-semibold
        leading-6 text-slate-800 dark:text-slate-100 hover:bg-slate-500 dark:hover:bg-slate-100
        hover:text-slate-100 dark:hover:text-slate-800"
    href="{{ $href }}"
    wire.navigate.hover
>{{ $slot }}</a>
