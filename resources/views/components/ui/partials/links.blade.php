@props(['active' => false])

@php
    $defaultClasses = 'duration-300 font-semibold leading-6 cursor-pointer';
    $classes = $active
        ? 'text-slate-800 dark:text-slate-50 underline underline-offset-8'
        : 'text-slate-600 transition hover:text-slate-800 dark:text-slate-300 hover:dark:text-slate-50 hover:underline hover:underline-offset-8';
@endphp

<a
    aria-current="{{ $active ? 'page' : 'false' }}"
    wire:navigate
    {{ $attributes->merge(['class' => $defaultClasses . ' ' . $classes]) }}
>
    {{ $slot }}
</a>
