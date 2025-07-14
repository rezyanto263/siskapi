<div x-show="!$store.sidebar.collapsed" @click="$store.sidebar.close()" x-transition.opacity.duration.300ms class="fixed min-h-full min-w-full bg-black/30 lg:hidden z-[49]"></div>
<aside
    :class="[
        'fixed top-0 left-0 h-screen bg-white shadow-[1px_0_3px_0_rgba(0,0,0,0.1)] z-50 transition-[transform,width] duration-300 transform',
        $store.sidebar.collapsed ? '-translate-x-full lg:w-16' : 'translate-x-0 lg:w-64',
        'w-80 lg:translate-x-0'
    ]">
    <div class="flex items-center justify-center h-14 border-b lg:static sticky">
        <x-button.icon icon="x" color="secondary" class="absolute left-2 top-1/2 -translate-y-1/2 lg:hidden p-1"
            iconClass="w-8 h-8" @click="$store.sidebar.toggle()" />
        <img src="{{ asset('/storage/pictures/logo.png') }}" alt="Logo" class="max-w-10 max-h-10">
        <h1 class="overflow-hidden whitespace-nowrap transition-all duration-300 text-3xl font-bold text-slate-600 tracking-widest"
            :class="$store.sidebar.collapsed ? 'max-w-[0ch] ml-0 opacity-0' : 'ml-2.5 max-w-[11ch] opacity-100'">
            SISKAPI
        </h1>
    </div>
    <div class="overflow-y-auto h-full">
        @foreach ($items as $item)
            <x-sidebar-link class="px-2" label="{{ $item['label'] }}" :navigations="$item['navigations']" />
        @endforeach
    </div>
</aside>
