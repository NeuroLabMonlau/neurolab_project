<x-app-layout>
<div class="flex flex-col w-full h-full gap-10 p-4 ">
        <div class="border-b-2 w-full">
            <h1 class="text-3xl font-bold text-gray-600">Editar categoría</h1>
        </div>
        @if(session('error'))
            <div class="bg-red-500 text-white p-4 rounded-lg text-center">
                {{ session('error') }}
            </div>
        @endif
        <form action="psycho.games.categories-update" method="post">
            @csrf
            @method('PUT')
            <div class="flex flex-col w-1/3 bg-white rounded-lg shadow-lg p-6 space-y-4 border-2 ">
                <div class="flex flex-col space-y-4">
                    <label for="name_category" class="text-gray-600">Nombre categoría</label>
                    <input type="text" name="name_category" id="name_category" class="border-2 border-gray-300 rounded-md p-2" value="" placeholder="{{ $category->name_category }}">
                </div>

                <input type="number" name="category_id" id="category_id" class="border-2 border-gray-300 rounded-md p-2" value="{{ $category->id }}" hidden>

                <div class="flex justify-center space-x-4">
                    <button type="submit" class="flex items-center justify-center w-1/2 px-4 py-2 bg-green-600 text-white rounded-md hover:bg-customGreen hover:text-blue-950  transition duration-300 ease-in-out">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        <span>Guardar</span>
                    </button>
                    <a href="{{ route('psycho.games.categories.index') }}" class="flex items-center justify-center w-1/2 px-4 py-2 bg-green-600 text-white rounded-md hover:bg-customGreen hover:text-blue-950 transition duration-300 ease-in-out">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                        </svg>
                        <span>Cancelar</span>
                    </a>
                </div>
            </div>
        </form>
</div>
@if (session('success'))
        <livewire:custom-modal :wire:key="'custom-modal-'.time()">
    @endif
</x-app-layout>