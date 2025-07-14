@props([
    'text',
    'type' => 'button',
    'color' => 'primary',
    'class' => '',
])

@php
    $base = 'p-3 transition rounded font-medium text-white';

    $variants = [
        'primary' => 'bg-blue-600 hover:bg-blue-700 active:bg-blue-800',
        'danger' => 'bg-red-600 hover:bg-red-700 active:bg-red-800',
        'warning' => 'bg-yellow-600 hover:bg-yellow-700 active:bg-yellow-800',
    ];

    $classes = "$base $variants[$color] $class"
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $text ?? $slot }}
</button>
