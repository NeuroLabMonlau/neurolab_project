<x-app-layout>
    <div class="flex flex-col w-full h-full gap-10 p-4 ">
        <div class="border-b-2 w-full">
            <h1 class="text-3xl font-bold text-gray-600">Ver y editar categorías</h1>
        </div>

        @if ($categories->isEmpty())
        <p>No hay categorías disponibles.</p>
        @else
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 divide-y divide-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left">Nombre</th>
                        <th class="px-4 py-2 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                    @foreach ($categories as $category)
                    <tr>
                        <td class="px-4 py-2">{{ $category->name_category }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('psycho.games.categories-edit', ['id' => $category->id]) }}" class="text-blue-600 hover:underline">Editar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $categories->links() }}
        </div>
        @endif
    </div>
</x-app-layout>