@props(['title', 'count', 'icon', 'iconClass'])

<div {{ $attributes->merge(['class' => "p-4 rounded shadow relative overflow-hidden group"]) }}>
    <x-dynamic-component :component="'tabler-' . $icon"
        class="absolute right-0 top-1/2 -translate-y-1/2 opacity-40 group-hover:opacity-100 group-hover:scale-150 group-hover:drop-shadow-sm transition-all duration-500 {{ $iconClass }}" />
    <div class="relative">
        <h3 class="text-white drop-shadow-sm text-sm sm:text-base">{{ $title }}</h3>
        <span class="text-5xl font-bold text-white drop-shadow">{{ $count }}</span>
    </div>
</div>
