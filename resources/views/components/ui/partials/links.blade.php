@props(['active' => false, 'type' => 'desktop'])

@php
    $commonClasses = 'font-bold leading-7 text-slate-800 dark:text-slate-100';

    $mobileClasses = $active
        ? '-mx-3 block rounded-lg px-3 py-2 text-base active:bg-slate-500 active:text-slate-300 dark:active:bg-slate-300'
        : '-mx-3 block rounded-lg px-3 py-2 text-base hover:bg-slate-500 hover:text-slate-300 dark:hover:bg-slate-300';

    $desktopClasses = $active
        ? 'text-sm leading-6 active:text-slate-500 dark:active:text-slate-300'
        : 'text-sm leading-6 hover:text-slate-500 dark:hover:text-slate-300';

    $classes = $type === 'mobile' ? $mobileClasses : $desktopClasses;
@endphp

<a wire:navigate.hover {{ $attributes->merge(['class' => $commonClasses . ' ' . $classes]) }}>
    {{ $slot }}
</a>
