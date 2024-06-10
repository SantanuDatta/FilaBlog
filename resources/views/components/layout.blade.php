<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0"
        >
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <title>{{ $title ?? config('app.name') }}</title>
    </head>

    <body class="antialiased">
        <x-header />
        <main id="content">
            <div class="mx-auto max-w-[85rem] px-4 pb-10 pt-12 sm:px-10 md:pt-12 md:px-10 lg:px-10">
                {{ $slot }}
            </div>
        </main>
        <x-footer />
    </body>

</html>
