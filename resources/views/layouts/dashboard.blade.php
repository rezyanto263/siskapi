<x-base-layout :title="$title" class="overflow-y-hidden">
    <div x-data x-cloak class="flex min-h-screen h-full max-h-full {{ $backgroundColor }}">
        <x-partials.sidebar />
        <div
            :class="[
                'transition-all duration-300 flex flex-col h-screen',
                $store.sidebar.collapsed ? 'lg:w-[calc(100%-64px)]' : 'lg:w-[calc(100%-256px)]',
                'w-full lg:ml-auto'
            ]">
            <x-partials.navbar :breadcrumb="$breadcrumb" />
            <main {{ $attributes->merge(['class' => 'overflow-y-auto overflow-x-hidden']) }}>
                {{ $slot }}
            </main>
        </div>
    </div>

    @stack('modals')
</x-base-layout>
