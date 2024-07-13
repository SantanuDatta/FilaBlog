<header
    class="absolute inset-x-0 top-0 z-50"
    x-data="{ open: false }"
    x-on:keydown.window.escape="open = false"
>
    <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <x-ui.partials.logo
                src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                href="#"
                alt="Your Company"
            />
        </div>
        <div class="flex lg:hidden">
            <x-ui.mobile.button x-on:click="open = true" />
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
            <x-ui.partials.links href="#">Products</x-ui.partials.links>
            <x-ui.partials.links href="#">Features</x-ui.partials.links>
            <x-ui.partials.links href="#">Marketplace</x-ui.partials.links>
            <x-ui.partials.dropdown>
                <x-slot:title>Company</x-slot:title>
                <x-ui.partials.dropdown-items href="#">About Us</x-ui.partials.dropdown-items>
                <x-ui.partials.dropdown-items href="#">Careers</x-ui.partials.dropdown-items>
                <x-ui.partials.dropdown-items href="#">Support</x-ui.partials.dropdown-items>
                <x-ui.partials.dropdown-items href="#">Press</x-ui.partials.dropdown-items>
                <x-ui.partials.dropdown-items href="#">Blog</x-ui.partials.dropdown-items>
            </x-ui.partials.dropdown>
        </div>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            <x-ui.partials.links href="#">Log in <span aria-hidden="true">→</span>
            </x-ui.partials.links>
        </div>
    </nav>

    <x-ui.mobile.menu>
        <div class="space-y-2 py-6">
            <x-ui.partials.links type="mobile" href="#">Products</x-ui.partials.links>
            <x-ui.partials.links type="mobile" href="#">Features</x-ui.partials.links>
            <x-ui.partials.links type="mobile" href="#">Marketplace</x-ui.partials.links>
            <x-ui.partials.dropdown mobile>
                <x-slot:title>Company</x-slot:title>
                <x-ui.partials.dropdown-items type="mobile" href="#">About Us</x-ui.partials.dropdown-items>
                <x-ui.partials.dropdown-items type="mobile" href="#">Careers</x-ui.partials.dropdown-items>
                <x-ui.partials.dropdown-items type="mobile" href="#">Support</x-ui.partials.dropdown-items>
                <x-ui.partials.dropdown-items type="mobile" href="#">Press</x-ui.partials.dropdown-items>
            </x-ui.partials.dropdown>
        </div>
        <div class="space-y-2 divide-slate-500/10 border-t dark:divide-slate-100/50">
            <x-ui.partials.links type="mobile" href="#">Log in <span
                    aria-hidden="true">→</span></x-ui.partials.links>
        </div>
    </x-ui.mobile.menu>
</header>
