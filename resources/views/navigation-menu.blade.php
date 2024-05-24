<nav x-data="{ open: false }" class="w-full flex flex-row">
    <ul class="space-y-2 font-medium flex-1">
        {{-- User is admin/psychologist --}}
        @if (Auth::user()->role_id == 5)
            {{-- <x-layouts.admin.nav></x-layouts.admin.nav> --}}
            {{-- User is tutor --}}
        @elseif (Auth::user()->role_id == 4)
            <x-layouts.tutor.nav></x-layouts.tutor.nav>
            {{-- User is student --}}
        @elseif (Auth::user()->role_id == 3)
            {{-- <x-layouts.student.nav></x-layouts.student.nav> --}}
            {{-- User is teacher --}}
        @elseif (Auth::user()->role_id == 2)
            <x-layouts.teacher.nav></x-layouts.teacher.nav>
        @endif
    </ul>



</nav>