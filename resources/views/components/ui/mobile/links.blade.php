@props(['active'])

@php
    $classes =
        $active ?? false
            ? '-mx-3 block rounded-lg px-3 py-2 text-base font-bold leading-7 text-slate-800 active:bg-slate-500 active:text-slate-300 dark:text-slate-100 dark:active:bg-slate-300'
            : '-mx-3 block rounded-lg px-3 py-2 text-base font-bold leading-7 text-slate-800 hover:bg-slate-500 hover:text-slate-300 dark:text-slate-100 dark:hover:bg-slate-300';
@endphp

<a
    wire.navigate.hover
    {{ $attributes->merge(['class' => $classes]) }}
>
    {{ $slot }}
</a>
