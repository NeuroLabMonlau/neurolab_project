<x-app-layout>
    <div class="container mx-auto px-4 py-8 bg-white rounded-lg shadow-md mt-4">
        <div class="border-b-2 border-gray-300 mb-8">
            <h1 class="text-3xl font-bold text-gray-800">{{ $gameTest->game->name_game }}</h1>
            <h2 class="text-sm font-bold text-gray-600">{{ $gameTest->test->test_name }}</h2>
        </div>

        <div class="mb-8">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <h2 class="text-xl font-bold text-gray-800">Categoría:</h2>
                    <p class="text-lg text-gray-700">{{ $gameTest->category->name_category }}</p>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-800">Nivel:</h2>
                    @if($gameTest->level == 1)
                    <p class="text-lg text-green-600">Fácil</p>
                    @elseif($gameTest->level == 5)
                    <p class="text-lg text-yellow-600">Medio</p>
                    @else
                    <p class="text-lg text-red-600">Difícil</p>
                    @endif
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-800">Puntuación Máxima:</h2>
                    <p class="text-lg text-gray-700">{{ $gameTest->max_score }}</p>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-800">Rondas:</h2>
                    <p class="text-lg text-gray-700">{{ $gameTest->rounds }}</p>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-800">Máximo de errores:</h2>
                    <p class="text-lg text-gray-700">{{ $gameTest->max_errors }}</p>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-800">Tiempo máximo:</h2>
                    <p class="text-lg text-gray-700">{{ $gameTest->max_time }}</p>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-800">Tiempo mínimo:</h2>
                    <p class="text-lg text-gray-700">{{ $gameTest->min_time }}</p>
                </div>
            </div>
        </div>

        <div class="mt-8 flex justify-end">
            <a href="{{ route('psycho.games.test.show', ['id' => $gameTest->test_id]) }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 focus:outline-none focus:bg-gray-400 transition duration-300 ease-in-out">
                Volver
            </a>
        </div>
    </div>
</x-app-layout>
