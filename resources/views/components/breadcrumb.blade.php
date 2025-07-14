@props(['items'])

<ol class="list-none p-0 inline-flex min-w-0">
    @foreach ($items as $item)
        <li @class([
            'inline-flex items-center font-medium',
            'min-w-0' => !$loop->first || count($items) == 1,
        ])>
            @if (!$loop->first)
                <span class="mx-1 text-slate-600">
                    <x-tabler-chevron-right class="w-4 h-4" style="stroke-width: 2.5" />
                </span>
            @endif

            @if (!empty($item['active']))
                <span class="text-slate-600 truncate">{{ $item['label'] }}</span>
            @else
                <a href="{{ $item['url'] ?? '#' }}"
                    class="text-blue-600 hover:text-blue-700 active:text-blue-800 text no-underline truncate">
                    {{ $item['label'] }}
                </a>
            @endif
        </li>
    @endforeach
</ol>
