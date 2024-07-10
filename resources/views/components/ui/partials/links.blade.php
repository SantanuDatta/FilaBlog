@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'text-sm font-bold leading-6 text-slate-800 dark:text-slate-100 active:text-slate-500 dark:active:text-slate-300'
            : 'text-sm font-bold leading-6 text-slate-800 dark:text-slate-100 hover:text-slate-500 dark:hover:text-slate-300';
@endphp

<a wire:navigate.hover {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
