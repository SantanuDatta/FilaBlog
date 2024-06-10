@props([
    'first' => false,
])

@php
    $baseClasses = 'flex items-center gap-x-2 py-2 font-medium text-white hover:text-blue-600 dark:text-white dark:hover:text-blue-500';
    $firstClasses = 'md:my-6 md:border-s md:border-gray-300 md:py-0 md:ps-3';
    $defaultClasses = 'md:my-6 md:py-2 md:ps-2'; // Adjust these classes as needed for non-first items
@endphp

<a class="{{ $baseClasses }} {{ $first ? $firstClasses : $defaultClasses }}">
    {{ $slot }}
</a>
