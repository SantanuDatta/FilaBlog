@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'block rounded-lg py-2 pl-6 pr-3 text-sm font-bold leading-7 text-slate-800 active:bg-slate-500 dark:text-slate-100 dark:active:bg-slate-300'
            : 'block rounded-lg py-2 pl-6 pr-3 text-sm font-bold leading-7 text-slate-800 hover:bg-slate-500 dark:text-slate-100 dark:hover:bg-slate-300';
@endphp

<a
    wire.navigate.hover
    {{ $attributes->merge(['class' => $classes]) }}
>
    {{ $slot }}
</a>
