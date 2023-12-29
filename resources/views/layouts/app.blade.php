<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.includes.head')
    <livewire:styles />
</head>
<body>
    <div id="app">
        {{-- @include('layouts.includes.navbar') --}}
        <main class="container py-4">
            {{ $slot }}
        </main>
    </div>
    <livewire:scripts />
</body>
</html>
