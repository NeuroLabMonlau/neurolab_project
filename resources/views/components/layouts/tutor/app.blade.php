<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NeuroLab</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200">

    {{-- <x-mary-nav sticky full-width class="lg:hidden">
    </x-mary-nav> --}}

    <x-mary-main full-width>

        <x-slot:sidebar drawer="main-drawer"  class="bg-base-100 lg:bg-inherit flex flex-1 shadow-md min-h-screen p-5 border">
            <x-layouts.tutor.partials.sidebar />
        </x-slot:sidebar>


        <x-slot:content>
            {{ $slot }}
        </x-slot:content>



        <x-slot:footer>
           <x-layouts.tutor.partials.footer />
        </x-slot:footer>


    </x-mary-main>

    @livewireScripts @livewireCalendarScripts
</body>

</html>