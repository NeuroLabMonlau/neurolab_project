<x-layouts.student.app>
    <x-mary-header title="Calendario" size="text-3xl" with-anchor />
    {{-- <div id="app">
        <calendar/>
    </div> --}}

    <livewire:appointments-calendar
    before-calendar-view="calendar/before"
    />

</x-layouts.student.app>


