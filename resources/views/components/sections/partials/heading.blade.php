@props(['title' => null])

<div class="px-6 pt-6 lg:px-0 lg:pt-8">
    <h2 class="text-2xl font-semibold text-slate-800 dark:text-slate-100">
        {{ $title ?? $slot }}
    </h2>
</div>
