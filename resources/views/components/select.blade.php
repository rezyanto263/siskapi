@props(['name', 'options', 'defaultValue' => null, 'placeholder' => null, 'width' => null])

<div x-data="select(@js($options), @js($placeholder), @js($defaultValue))" class="relative" x-ref="select">
    <input type="hidden" name="{{ $name }}" :value="selected">
    <button type="button" @click="open = !open"
        {{ $attributes->class([$width, 'bg-white border p-4 rounded shadow text-left flex items-center justify-between gap-3']) }}>
        <span x-text="displayText" class="text-nowrap"
            :class="{
                'truncate text-slate-700': displayText !== placeholder,
                'text-slate-400': displayText === placeholder
            }"
            :style="@js($width) ? '' : `width: ${longestTextLength}ch`"
            :class="{{ $width ? '@js($width)' : '' }}">
        </span>
        <x-tabler-caret-down-f ::class="{ 'w-4 h-4 text-slate-700 transition-all duration-300': true, 'rotate-180': open }" />
    </button>
    <ul x-show="open" x-transition.opacity @click.outside="open = false"
        class="absolute w-full mt-1 bg-white border rounded shadow z-10 overflow-hidden">
        <template x-for="[value, text] in Object.entries(options)">
            <li @click="selected = value; open = false;
                    $nextTick(() => {
                        $refs.select.querySelector('input[type=hidden]')?.dispatchEvent(new Event('change'));
                    });"
                x-text="text"
                :class="['px-4 py-2 truncate w-full cursor-pointer', selected == value ? 'text-blue-600 bg-slate-100' :
                    'text-slate-700 hover:bg-slate-100'
                ]">
            </li>
        </template>
    </ul>
</div>
