@props(['close' => false])

<svg
    class="size-5"
    {{ $close ? 'aria-hidden="true"' : 'xmlns="http://www.w3.org/2000/svg"' }}
    fill="none"
    viewBox="0 0 24 24"
    stroke-width="1.5"
    stroke="currentColor"
>
    <path
        stroke-linecap="round"
        stroke-linejoin="round"
        d="{{ $close ? 'M6 18L18 6M6 6l12 12' : 'M3.75 6.75h16.5M3.75 12h16.5M12 17.25h8.25' }}"
    />
</svg>
