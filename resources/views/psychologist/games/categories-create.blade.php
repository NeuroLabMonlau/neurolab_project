<x-app-layout>
    <div class="flex flex-col gap-8 w-full h-full p-4">
        @if(session('error'))
            <div class="bg-red-500 text-white p-4 rounded-lg text-center">
                {{ session('error') }}
            </div>
        @endif
        <div class="border-b-2 w-full">
            <h1 class="text-3xl font-bold text-gray-600">Nueva Categoría</h1>
        </div>
        <div class="w-1/2">
            <x-validation-errors class="mb-4" />
            <form action="{{ route('psycho.games.categories.store') }}" method="post">
                @csrf
                <div class="flex flex-col w-full gap-4 p-4">
                    <div class="flex flex-col w-full gap-4">
                        <label for="name_category" class="text-lg font-bold text-gray-600">Nombre categoría</label>
                        <input type="text" name="name_category" id="name_category" class="w-full p-2 border-2 border-gray-300 rounded-md" required>
                    </div>
                    <div class="flex justify-center">
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-customGreen hover:text-blue-950 transition duration-300 ease-in-out">Crear</button>
                    </div>
                </div>
            </form>
        </div>
        <div>
            <a href="{{ route('psycho.games.index') }}" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-customGreen hover:text-blue-950 transition duration-300 ease-in-out">Volver</a>
            <a href="{{ route('psycho.games.categories.index') }}" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-customGreen hover:text-blue-950 transition duration-300 ease-in-out">Ver categorías</a>
        </div>
    </div>

    @if (session('success'))
        <livewire:custom-modal :wire:key="'custom-modal-'.time()">
    @endif
</x-app-layout>