<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="border-b-2 border-gray-300 mb-8">
            <h1 class="text-3xl font-bold text-gray-800">{{ $testGames->first()->test->test_name }}</h1>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full bg-white border border-gray-300 rounded-lg shadow-md">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Juego</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoría</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                    @foreach ($testGames as $testGame)
                    <tr class="table-rows">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $testGame->game->name_game }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $testGame->category->name_category}}</td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('psycho.games.test.game-edit', ['idGame' => $testGame->game->id, 'idTest' => $testGame->test_id, 'idCategory' =>$testGame->category_id]) }}" class="text-blue-600 hover:underline">Editar</a>
                            <a href="{{ route('psycho.games.test.game-show', ['idGame' => $testGame->game->id, 'idTest' => $testGame->test_id, 'idCategory' =>$testGame->category_id]) }}" class="text-blue-600 hover:underline">Ver</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        @if ($testGames->isEmpty())
        <p class="text-gray-600 mt-4">No hay juegos disponibles.</p>
        @endif

        <div class="mt-8">
            {{ $testGames->links() }}
        </div>
       
        <div class="mt-8 flex justify-between">
            <a href="{{ route('psycho.games.tests.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 focus:outline-none focus:bg-gray-400 transition duration-300 ease-in-out">
                Volver
            </a>
        </div>
    </div>

</x-app-layout>