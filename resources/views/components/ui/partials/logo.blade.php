@props(['src', 'alt'])

<logo>
    <a wire:navigate {{ $attributes->merge(['class' => '-m-1.5 p-1.5']) }}>
        <span class="sr-only">{{ $alt }}</span>
        <img
            class="h-8 w-auto cursor-pointer"
            src="{{ $src }}"
            alt="{{ $alt }}"
        >
    </a>
</logo>
