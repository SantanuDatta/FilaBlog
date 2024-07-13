@props(['active' => false, 'type' => 'desktop'])

@php
    $commonClasses = 'block rounded-lg text-sm font-bold leading-7 text-slate-800 dark:text-slate-100';

    $mobileClasses = $active
        ? 'py-2 pl-6 pr-3 active:bg-slate-500 dark:active:bg-slate-300'
        : 'py-2 pl-6 pr-3 hover:bg-slate-500 dark:hover:bg-slate-300';

    $desktopClasses = $active
        ? 'px-3 py-2 text-sm leading-6 active:bg-slate-500 dark:active:bg-slate-100 active:text-slate-100 dark:active:text-slate-800'
        : 'px-3 py-2 text-sm leading-6 hover:bg-slate-500 dark:hover:bg-slate-100 hover:text-slate-100 dark:hover:text-slate-800';

    $classes = $type === 'mobile' ? $mobileClasses : $desktopClasses;
@endphp

<a {{ $attributes->merge(['class' => $commonClasses . ' ' . $classes]) }}>
    {{ $slot }}
</a>
