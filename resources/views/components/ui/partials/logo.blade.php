@props(['src', 'alt', 'href'])

    <a
        class="-m-1.5 p-1.5"
        href="{{ $href }}"
        wire.navigate.hover
    >
        <span class="sr-only">{{ $alt }}</span>
        <img
            class="h-8 w-auto"
            src="{{ $src }}"
            alt="{{ $alt }}"
        >
    </a>
