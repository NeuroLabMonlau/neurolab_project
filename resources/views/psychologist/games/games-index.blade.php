<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="border-b-2 border-gray-300 mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Gestión de Juegos</h1>
        </div>

        @if ($games->isEmpty())
        <p class="text-gray-600">No hay juegos disponibles.</p>
        @else
        <div class="overflow-x-auto">
            <table class="w-full bg-white border border-gray-300 rounded-lg shadow-md">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoría</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nivel</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Max.Punt.</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rondas</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Max.Error</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Max.Tiempo</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Min.Tiempo</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                    @foreach ($games as $game)
                    <tr class="table-rows">
                        <input type="text" id="game-id" class="game-id" value="{{ $game->id }}" hidden>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $game->name_game }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $game->category->name_category }}</td>
                        <td class="">
                            <select name="level" id="level-game" class="px-6 py-4 whitespace-nowrap border-1 border-gray-300 rounded-md level-game">
                                <option value=""></option>
                                @foreach($game->parameters as $parameter)
                                <option value="{{ $parameter->level }}">{{ $parameter->level }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap" id="max-scores"></td>
                        <td class="px-6 py-4 whitespace-nowrap" id="rounds-game"></td>
                        <td class="px-6 py-4 whitespace-nowrap" id="max-errors"></td>
                        <td class="px-6 py-4 whitespace-nowrap" id="max-time"></td>
                        <td class="px-6 py-4 whitespace-nowrap" id="min-time"></td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('psycho.games.categories-edit', ['id' => $game->id]) }}" class="text-blue-600 hover:underline">Editar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-8">
            {{ $games->links() }}
        </div>
        @endif

        <div class="mt-8 flex justify-between">
            <a href="{{ route('psycho.games.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 focus:outline-none focus:bg-gray-400 transition duration-300 ease-in-out">
                Volver
            </a>
        </div>
    </div>
</x-app-layout>