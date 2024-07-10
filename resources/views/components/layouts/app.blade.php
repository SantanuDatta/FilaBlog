<!DOCTYPE html>
<html class="h-full bg-slate-50 dark:bg-slate-800" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <x-layouts.header.meta />
        <title>{{ $title ?? 'Page Title' }}</title>
    </head>

    <body class="min-h-screen antialiased md:subpixel-antialiased">
        <x-ui.header />
        <main id="main" aria-labelledby="main website content">
            {{ $slot }}
        </main>
        <x-layouts.header.scripts />
    </body>

</html>
