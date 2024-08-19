<!DOCTYPE html>
<html class="h-full scroll-smooth md:scroll-auto" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <x-layouts.header.meta />
        <title>{{ $title ?? 'Page Title' }}</title>
    </head>

    <body class="mx-auto max-w-6xl bg-slate-50 antialiased dark:bg-slate-900 md:subpixel-antialiased">
        <x-ui.header />
        <main id="main" aria-labelledby="main website content">
            {{ $slot }}
        </main>
        <x-ui.footer />
        <x-layouts.header.scripts />
    </body>

</html>
