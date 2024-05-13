<x-app-layout class="studentBg ">
    <x-mary-header title="Bienvenido de nuevo {{ Auth::user()->username }}" size="text-3xl" with-anchor />
        <div class="flex justify-center items-center  w-full h-full">
            <div class="flex flex-col justify-center items-center w-60 space-y-4 font-bold text-black text-2xl">
                <button id="btn-student-dashboard" class="w-full py-2 rounded-xl jugarBtn">Jugar!</button>
                <button id="btn-student-dashboard" class="w-full py-2 rounded-xl sociogramBtn">Sociograma</button>
                <button id="btn-student-dashboard" class="w-full py-2 rounded-xl tuPlan">Tu Plan</button>
            </div>
        </div>
    <div id="app">
        
        {{-- <minicalendar /> --}}
    </div>
</x-app-layout>
