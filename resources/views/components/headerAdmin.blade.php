<div class="w-full fixed flex flex-row bg-gray-200 p-4 shadow-lg border-b-2 border-red-400">

    {{-- side bar --}}
    <div class="w-72 transition" :class="{'block': open, 'hidden': !open}">
        <x-nav-link ></x-nav-link>
        
    </div>
    
    <div class="w-full flex flex-1 ">
        
        <!-- Botón de hamburguesa -->
        <div class="w-1/6 flex justify-center items-center pr-5 border-r-2 border-gray-400 ">
            <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    
        
        
        <div class="w-4/6 flex justify-start ml-5 items-center">
            {{-- Home --}}
            <div class="flex w-14 justify-center items-center mr-2 p-1">
                <a href="{{ url('/admin/dashboard') }}" class="text-xl font-bold hover:text-red-500 "><svg class="fill-zinc-400 hover:fill-red-500  hover:-translate-y-1 active:translate-y-1  hover:drop-shadow-xl transition" xmlns="http://www.w3.org/2000/svg" height="34" viewBox="0 -960 960 960" width="34"><path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z"/></svg></a>
                
            </div>
            
            {{-- Monlau --}}
            <div class="flex w-14 justify-center items-center mr-2 p-1">
                <a href="https://moodlesg.monlau.com/" target="_blank" class="text-xl font-bold "><svg class="fill-zinc-400 hover:fill-red-500 hover:-translate-y-1 active:translate-y-1 hover:drop-shadow-xl transition" xmlns="http://www.w3.org/2000/svg" height="34" viewBox="0 -960 960 960" width="34"><path d="M480-120 200-272v-240L40-600l440-240 440 240v320h-80v-276l-80 44v240L480-120Zm0-332 274-148-274-148-274 148 274 148Zm0 241 200-108v-151L480-360 280-470v151l200 108Zm0-241Zm0 90Zm0 0Z"/></svg></a>
            </div>

            {{-- Calendario --}}
            <div class="flex w-14 justify-center items-center mr-2 p-1">
                <a href="{{ route('dashboard') }}" class="text-xl font-bold "><svg class="fill-zinc-400 hover:fill-red-500 hover:-translate-y-1 active:translate-y-1 hover:drop-shadow-xl transition" xmlns="http://www.w3.org/2000/svg" height="34" viewBox="0 -960 960 960" width="34"><path d="M200-80q-33 0-56.5-23.5T120-160v-560q0-33 23.5-56.5T200-800h40v-80h80v80h320v-80h80v80h40q33 0 56.5 23.5T840-720v560q0 33-23.5 56.5T760-80H200Zm0-80h560v-400H200v400Zm0-480h560v-80H200v80Zm0 0v-80 80Zm280 240q-17 0-28.5-11.5T440-440q0-17 11.5-28.5T480-480q17 0 28.5 11.5T520-440q0 17-11.5 28.5T480-400Zm-160 0q-17 0-28.5-11.5T280-440q0-17 11.5-28.5T320-480q17 0 28.5 11.5T360-440q0 17-11.5 28.5T320-400Zm320 0q-17 0-28.5-11.5T600-440q0-17 11.5-28.5T640-480q17 0 28.5 11.5T680-440q0 17-11.5 28.5T640-400ZM480-240q-17 0-28.5-11.5T440-280q0-17 11.5-28.5T480-320q17 0 28.5 11.5T520-280q0 17-11.5 28.5T480-240Zm-160 0q-17 0-28.5-11.5T280-280q0-17 11.5-28.5T320-320q17 0 28.5 11.5T360-280q0 17-11.5 28.5T320-240Zm320 0q-17 0-28.5-11.5T600-280q0-17 11.5-28.5T640-320q17 0 28.5 11.5T680-280q0 17-11.5 28.5T640-240Z"/></svg></a>
            </div>

            {{-- Email --}}
            <div class="flex w-14 justify-center items-center mr-2 p-1">
                <a href="{{ route('dashboard') }}" class="text-xl font-bold "><svg class="fill-zinc-400 hover:fill-red-500 hover:-translate-y-1 active:translate-y-1 hover:drop-shadow-xl transition" xmlns="http://www.w3.org/2000/svg" height="34" viewBox="0 -960 960 960" width="34"><path d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z"/></svg></a>
            </div>
    
            <div class="flex w-18 h-18 fixed right-4 bottom-4 p-5 bg-zinc-800 rounded-full hover:bg-yellow-500 transition">
                <a href="{{ route('dashboard') }}" class="text-xl font-bold text-gray-200"><svg class="text-gray-200" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path fill="#e9e9e9" d="M424-320q0-81 14.5-116.5T500-514q41-36 62.5-62.5T584-637q0-41-27.5-68T480-732q-51 0-77.5 31T365-638l-103-44q21-64 77-111t141-47q105 0 161.5 58.5T698-641q0 50-21.5 85.5T609-475q-49 47-59.5 71.5T539-320H424Zm56 240q-33 0-56.5-23.5T400-160q0-33 23.5-56.5T480-240q33 0 56.5 23.5T560-160q0 33-23.5 56.5T480-80Z"/></svg></a>
            </div>
            
        </div>
     
    
    
        <div class="w-1/6 flex justify-center items-center">
            <div class=" sm:flex sm:items-center sm:ms-6">
    
            <!-- Settings Dropdown -->
            <div class="ms-3 relative">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                        @else
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                    {{ Auth::user()->name }}
                                    
                                    <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                            </span>
                        @endif
                    </x-slot>
    
                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>
    
                        <x-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-dropdown-link>
    
                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                {{ __('API Tokens') }}
                            </x-dropdown-link>
                        @endif
    
                        <div class="border-t border-gray-200"></div>
    
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
    
                            <x-dropdown-link href="{{ route('logout') }}"
                                    @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
    
        </div>
    
    
        <!-- Responsive Navigation Menu -->
        {{-- <div :class="{'block': open, 'hidden': !open}">
            <!-- Responsive Nav Link -->
            <x-responsive-nav-link>
    
                <x-nav-link ></x-nav-link>
    
            </x-responsive-nav-link>
            
        </div> --}}
    
    
    </div>
</div>