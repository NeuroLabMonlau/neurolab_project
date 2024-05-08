<x-mary-menu activate-by-route class="flex flex-1">

    <span class="ml-5 py-5 font-extrabold text-2xl flex items-center gap-2">
            <x-icons.student-icon class="w-6 h-6 inline" />
            <h3>NeuroLab</h3>
    </span>


    <x-mary-menu-item title="Home" icon="o-home" link=" {{ route('student.dashboard')}} " />
    <x-mary-menu-item title="Chats" icon="o-chat-bubble-left-right" link=" {{ route('student.chat')}} " />
    <x-mary-menu-item title="Calendario" icon="o-calendar-days" link="{{ route('student.calendar')}}" />
    <x-mary-menu-item title="User" icon="" link="{{ route('student.profile')}}" />
    
    {{-- <x-mary-menu-item title="Theme" icon="o-swatch" @click="$dispatch('mary-toggle-theme')" /> --}}



</x-mary-menu>