<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NeuroLab</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200">
 
    <x-mary-nav sticky full-width class="lg:hidden">
    </x-mary-nav>
 
    <x-mary-main full-width>
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit"> 

            <x-mary-menu activate-by-route>
                <x-mary-menu-item title="Hello" icon="o-sparkles" link="/" />
                <x-mary-menu-item title="Wifi" icon="o-wifi" link="####" />

            </x-mary-menu>

        </x-slot:sidebar>

 
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>


        <x-slot:footer>
            <hr>

            <div></div>
        
        </x-slot:footer>
    </x-mary-main>
 </body>
</html>