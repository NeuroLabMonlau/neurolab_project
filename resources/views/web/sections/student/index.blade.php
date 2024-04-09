<x-layouts.student.app>
    <x-mary-header title="Bienvenido de nuevo {{ Auth::user()->username }}" size="text-3xl" with-anchor />

    <div id="app">
        <minicalendar/>
    </div>
</x-layouts.student.app>


