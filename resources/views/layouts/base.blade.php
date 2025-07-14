<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="icon" href="{{ asset('/storage/pictures/logo.png') }}">

    @stack('pre-styles')
    @vite('resources/css/app.css')
    @stack('styles')
</head>

<body {{ $attributes->class('overflow-x-hidden') }}>
    {{ $slot }}

    @stack('pre-scripts')
    @vite('resources/js/app.js')
    @stack('scripts')
</body>

</html>
