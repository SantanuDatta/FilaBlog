<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <x-layouts.header.meta/>
        <title>{{ $title ?? 'Page Title' }}</title>
    </head>
    <body class="antialiased">
        <x-ui.header/>
        {{ $slot }}
        <x-layouts.header.scripts/>
    </body>
</html>
