<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('js/games.js') }}" defer></script>
    <script src="{{ asset('js/games_list.js') }}" defer></script>

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased ">

    <div class="min-h-screen bg-gray-100 flex flex-col @if(Auth::user()->role_id == 3) studentBg @endif">
        @livewire('navigation-menu')

        <div class="flex-1 flex ">
            @livewire('sidebar-component')
            
            {{-- @ Page content --}}
            <main class="flex-1 flex flex-col p-8 ">
                {{ $slot }}
            </main>
            
        </div>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
