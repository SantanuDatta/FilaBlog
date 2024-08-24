<header
    class=""
    x-data="{ open: false }"
    x-on:keydown.window.escape="open = false"
>
    <nav class="flex items-center justify-between px-6 lg:px-0">
        <div class="flex lg:flex-1">
            <x-ui.partials.logo
                src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                href="#"
                alt="Your Company"
            />
        </div>
        <div class="flex md:hidden lg:hidden">
            <x-ui.mobile.button x-on:click="open = true" />
        </div>
        <div class="hidden md:flex md:gap-x-4 lg:flex lg:gap-x-6">
            <x-ui.partials.links>Blog</x-ui.partials.links>
            <x-ui.partials.links>Projects</x-ui.partials.links>
            <x-ui.partials.links>About</x-ui.partials.links>
            <x-ui.partials.links>Newsletter</x-ui.partials.links>
        </div>
    </nav>
    <x-ui.mobile.menu>
        <div class="mx-auto flex flex-col items-center space-y-6 py-6 md:flex-row">
            <x-ui.partials.links type="mobile" href="#">Blog</x-ui.partials.links>
            <x-ui.partials.links type="mobile" href="#">Projects</x-ui.partials.links>
            <x-ui.partials.links type="mobile" href="#">About</x-ui.partials.links>
            <x-ui.partials.links type="mobile" href="#">Newsletter</x-ui.partials.links>
        </div>
    </x-ui.mobile.menu>
</header>
