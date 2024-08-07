@props(['mobile' => false])

<svg
    aria-hidden="true"
    {{ $attributes->merge([
        'class' => 'size-5 flex-none ' . ($mobile ? '' : 'font-bold text-slate-800 dark:text-slate-100'),
    ]) }}
    x-bind:class="{{ $mobile ? "{ 'rotate-180': open }" : '{}' }}"
    viewBox="0 0 20 20"
    fill="currentColor"
>
    <path
        fill-rule="evenodd"
        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
        clip-rule="evenodd"
    />
</svg>
