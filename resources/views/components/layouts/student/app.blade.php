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

        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">
            @include('components.layouts.student.partials.sidebar')
        </x-slot:sidebar>


        <x-slot:content>
            {{ $slot }}
        </x-slot:content>



        <x-slot:footer>
            @include('components.layouts.student.partials.footer')
        </x-slot:footer>


    </x-mary-main>

<<<<<<< HEAD
    @livewireScripts

=======
    @livewireScripts @livewireCalendarScripts
>>>>>>> 3ed1371a978bd96ed71571a55f4238b77716f18e
</body>

</html>