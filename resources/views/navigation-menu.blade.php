<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    
    @if(auth()->user()->role_id == 5)
        <x-headerPsycho></x-headerPsycho>
    @else
        <x-headerAdmin></x-headerAdmin>
    @endif

   
</nav>
