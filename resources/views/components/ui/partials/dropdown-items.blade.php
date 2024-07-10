@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'block rounded-lg px-3 py-2 text-sm font-semibold leading-6 text-slate-800 dark:text-slate-100 active:bg-slate-500 dark:active:bg-slate-100
                active:text-slate-100 dark:active:text-slate-800'
            : 'block rounded-lg px-3 py-2 text-sm font-semibold leading-6 text-slate-800 dark:text-slate-100 hover:bg-slate-500 dark:hover:bg-slate-100
                hover:text-slate-100 dark:hover:text-slate-800';
@endphp

<a wire.navigate.hover {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
