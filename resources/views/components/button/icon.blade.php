@props([
    'icon',
    'type' => 'button',
    'color' => 'primary',
    'class' => '',
    'iconClass' => '',
])

@php
    $base = 'transition rounded';

    $variants = [
        'primary' => 'text-blue-600 hover:text-blue-700 active:text-blue-800',
        'secondary' => 'text-slate-600 hover:text-slate-700 active:text-slate-800 hover:bg-slate-100',
        'danger' => 'text-red-600 hover:text-red-700 active:text-red-800',
        'warning' => 'text-yellow-600 hover:text-yellow-700 active:text-yellow-800',
        'clear' => ''
    ];

    $classes = "$base $variants[$color] $class"
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
    <x-dynamic-component :component="'tabler-' . $icon" class="{{ $iconClass }}" />
</button>
