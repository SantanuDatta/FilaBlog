@props(['href'])

<a
    class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-slate-800 dark:text-slate-100  hover:bg-slate-500 dark:hover:bg-slate-300"
    href="{{ $href }}"
    wire.navigate.hover
>
    {{ $slot }}
</a>
