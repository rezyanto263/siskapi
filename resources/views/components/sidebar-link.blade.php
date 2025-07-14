@props(['navigations', 'label' => null, 'notification' => null])

@if ($label)
    <label class="text-slate-600 px-4 py-2 flex items-center border-y">
        <span class="transition-all duration-300 text-sm whitespace-nowrap overflow-hidden font-bold"
            :class="$store.sidebar.collapsed ? 'max-w-0 opacity-0' : 'max-w-full opacity-100'">{{ $label }}</span>
        <x-tabler-circle-dot class="transition-all duration-300 h-3 whitespace-nowrap overflow-hidden"
            ::class="$store.sidebar.collapsed ? 'w-3 opacity-100 m-auto' : 'w-0 opacity-0'" style="stroke-width: 5" />
    </label>
@endif
<ol {{ $attributes->merge() }}>
    @foreach ($navigations as $item)
        <li @class([
            'rounded my-2',
            'text-slate-600 hover:text-slate-700 hover:bg-slate-100' => !request()->routeIs($item['route'] . '*'),
            'bg-slate-100 text-blue-600 shadow' => request()->routeIs($item['route'] . '*'),
        ]) title="{{ $item['text'] }}">
            <a href="{{ route($item['route']) }}" class="flex items-center px-2 py-1.5 relative" @click="$store.sidebar.handleClick()">
                @if (!empty($item['counter']))
                    <span
                        class="bg-red-600 text-white text-[10px] rounded-full w-5 h-5 absolute top-0 left-0 text-center flex items-center justify-center">
                        {{ $item['counter'] }}
                    </span>
                @endif
                <x-dynamic-component :component="'tabler-' . $item['icon']" class="w-8 h-8" />
                <span :class="[
                    'overflow-hidden whitespace-nowrap transition-[max-width,margin-left,opacity] duration-300 font-medium',
                    $store.sidebar.collapsed ? 'max-w-0 ml-0 opacity-0' : 'ml-2.5 max-w-full opacity-100',
                ]">
                    {{ $item['text'] }}
                </span>
            </a>
        </li>
    @endforeach
</ol>
