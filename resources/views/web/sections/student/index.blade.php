<x-app-layout>
    <x-mary-header title="Bienvenido de nuevo {{ Auth::user()->username }}" size="text-3xl" with-anchor />

    <div id="app">
        <minicalendar />
    </div>
</x-app-layout>
