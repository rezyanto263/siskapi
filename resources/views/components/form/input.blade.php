@props(['type' => 'text', 'name', 'label', 'value' => null, 'wrapClass' => null])

<div {{ $attributes->class(['group mb-3', $wrapClass]) }}>
    <label for="{{ $name }}" class="group-focus-within:text-sky-600 transition block mb-1">{{ $label }}</label>
    @if ($value)
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}" {{ $attributes->merge(['class' => 'px-2 py-2.5 w-full block outline-2 outline outline-slate-400 rounded focus:outline-sky-600 focus:outline-2 transition text-lg disabled:bg-slate-50']) }}>
    @else
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name) }}" {{ $attributes->merge(['class' => 'px-2 py-2.5 w-full block outline-2 outline outline-slate-400 rounded focus:outline-sky-600 focus:outline-2 transition text-lg']) }}>
    @endif
    @error($name)
    <small class="text-red-600">{{ $message }}</small>
    @enderror
</div>
