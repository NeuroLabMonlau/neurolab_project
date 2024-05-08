<div class="px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800 flex flex-col">
    <ul class="space-y-2 font-medium flex-1">
        {{-- User is admin/psychologist --}}
        @if (Auth::user()->role_id == 5)
            <x-layouts.admin.sidebar></x-layouts.admin.sidebar>
            {{-- User is tutor --}}
        @elseif (Auth::user()->role_id == 4)
            <x-layouts.tutor.sidebar></x-layouts.tutor.sidebar>
            {{-- User is student --}}
        @elseif (Auth::user()->role_id == 3)
            <x-layouts.student.sidebar></x-layouts.student.sidebar>
            {{-- User is teacher --}}
        @elseif (Auth::user()->role_id == 2)
            <x-layouts.teacher.sidebar></x-layouts.teacher.sidebar>
        @endif
    </ul>
    <div>
        <ul>
            <li>
                <a href="{{ route('profile.show') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <span class="flex-1 ms-3 whitespace-nowrap">{{ Auth::user()->username }}</span>
                </a>
            </li>

            <div class="border-t border-gray-200"></div>

            <li>
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <a href="{{ route('profile.show') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <span class="flex-1 ms-3 whitespace-nowrap" href="{{ route('logout') }}"
                            @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </span>
                    </a>
                </form>
            </li>
        </ul>
    </div>
</div>
