@props(['text', 'items', 'class' => '', 'textClass' => ''])

<div x-data="dropdown" class="relative inline-block text-left {{ $class }}">
    <button @click="toggle" class="flex items-center px-2 py-1 text-sm font-medium text-slate-600 hover:text-slate-700 active:text-slate-800 {{ $textClass }}">
        {{ $text }}
    </button>

    <div x-show="open" @click.outside="open = false" x-transition
         class="absolute right-0 z-50 mt-2 w-48 origin-top-right bg-white rounded shadow-lg overflow-hidden border">
        {{ $items }}
    </div>
</div>
