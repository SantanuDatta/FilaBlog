@props(['href'])

<a
    class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-slate-800 dark:text-slate-100 hover:bg-slate-500 dark:hover:bg-slate-300"
    href="{{ $href }}"
>
    {{ $slot }}
</a>
