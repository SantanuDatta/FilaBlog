<a
    wire:navigate.hover
    {{ $attributes->merge([
        'class' => 'text-sm font-bold leading-6 text-slate-800 dark:text-slate-100
                hover:text-slate-400 dark:hover:text-slate-300',
    ]) }}
>
    {{ $slot }}
</a>
