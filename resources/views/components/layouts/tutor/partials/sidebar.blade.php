<x-mary-menu activate-by-route class="flex flex-1">

    <span class="ml-5 py-5 font-extrabold text-2xl flex items-center gap-2">
        <h3>Miraki</h3>
    </span>

    @if($user = auth()->user())

    <x-mary-list-item :item="$user" value="name" sub-value="email" no-separator no-hover class="-mx-2 !-my-2 rounded border-y border-zinc-900">
        <x-slot:actions>
            <x-mary-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff" no-wire-navigate link="{{ route('logout')}}" />
        </x-slot:actions>
    </x-mary-list-item>

    @endif

    <x-mary-menu-item title="Home" icon="o-home" link=" {{ route('tutor.dashboard')}} " />

    <x-mary-menu-item title="Children" icon="o-user-group" link=" {{ route('tutor.children')}} " />

</x-mary-menu>