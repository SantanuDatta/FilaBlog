@props([
    'drop' => false,
    'active' => false,
])

@if (!$drop)
    <a
        class="{{ $active ? 'text-blue-600 dark:text-blue-500 font-bold bg-neutral-700' : 'text-gray-500 dark:text-white hover:text-blue-400 dark:hover:text-blue-500 dark:hover:bg-neutral-700 font-semibold' }} p-2 lg:mx-1 sm:px-3 md:mx-1 focus:ring-2 rounded-lg" 
        aria-current="{{ $active ? 'page' : false }}"
        {{ $attributes }}
    >{{ $slot }}</a>
@else
    <a
        class="{{ $active ? 'text-blue-600 dark:text-blue-500 bg-neutral-700 font-bold' : 'text-gray-800 hover:bg-blue-100 dark:text-white dark:hover:bg-neutral-700 dark:hover:text-neutral-300 focus:ring-blue-500' }} flex items-center gap-x-3.5 rounded-lg p-2 text-sm focus:ring-2"
        aria-current="{{ $active ? 'page' : false }}"
        {{ $attributes }}
    >
        {{ $slot }}
    </a>
@endif
