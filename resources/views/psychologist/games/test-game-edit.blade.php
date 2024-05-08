<x-app-layout>
    <div class="container mx-auto px-4 py-8 bg-white rounded-lg shadow-md mt-4">
        <div class="border-b-2 border-gray-300 mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Editar juego</h1>
        </div>

        <form action="{{ route('psycho.games.test.game-update', ['idGame' => $gameTest->game->id, 'idTest' => $gameTest->test_id, 'idCategory' =>$gameTest->category_id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="level" class="block text-sm font-medium text-gray-700">Nivel</label>
                    <select id="level" name="level" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="1" {{ $gameTest->level == 1 ? 'selected' : '' }}>Fácil</option>
                        <option value="5" {{ $gameTest->level == 5 ? 'selected' : '' }}>Medio</option>
                        <option value="10" {{ $gameTest->level == 10 ? 'selected' : '' }}>Difícil</option>
                    </select>
                </div>
                <div>
                    <label for="max_score" class="block text-sm font-medium text-gray-700">Puntuación máxima</label>
                    <input type="number" name="max_score" id="max_score" value="{{ $gameTest->max_score }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="rounds" class="block text-sm font-medium text-gray-700">Rondas</label>
                    <input type="number" name="rounds" id="rounds" value="{{ $gameTest->rounds }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="max_errors" class="block text-sm font-medium text-gray-700">Máximo de errores</label>
                    <input type="number" name="max_errors" id="max_errors" value="{{ $gameTest->max_errors }}" class="mt-1 block
                    w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="max_time" class="block text-sm font-medium text-gray-700">Tiempo máximo</label>
                    <input type="number" name="max_time" id="max_time" value="{{ $gameTest->max_time }}" class="mt-1 block
                    w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="min_time" class="block text-sm font-medium text-gray-700">Tiempo mínimo</label>
                    <input type="number" name="min_time" id="min_time" value="{{ $gameTest->min_time }}" class="mt-1 block
                    w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
            </div>

            <div class="mt-8 flex justify-center">
                <button type="submit" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 focus:outline-none focus:bg-gray-400 transition duration-300 ease-in-out">
                    Guardar
                </button>
            </div>
        </form>

        @if ($errors->any())
        <div class="mt-8 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="mt-8 flex justify-center">
            <a href="{{ route('psycho.games.test.show', ['id' => $gameTest->test_id]) }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 focus:outline-none focus:bg-gray-400 transition duration-300 ease-in-out">
                Volver
            </a>
        </div>
    </div>
    @if (session('success'))
    <livewire:custom-modal :wire:key="'custom-modal-'.time()">
    @endif

</x-app-layout>