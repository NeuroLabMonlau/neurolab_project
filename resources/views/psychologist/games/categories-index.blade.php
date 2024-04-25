<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="border-b-2 border-gray-300 mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Gestión de Categorías</h1>
        </div>

        @if ($categories->isEmpty())
        <p class="text-gray-600">No hay categorías disponibles.</p>
        @else
        <div class="overflow-x-auto">
            <table class="w-full bg-white border border-gray-300 rounded-lg shadow-md">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                    @foreach ($categories as $category)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $category->name_category }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('psycho.games.categories-edit', ['id' => $category->id]) }}" class="text-blue-600 hover:underline">Editar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-8">
            {{ $categories->links() }}
        </div>
        @endif
    </div>
</x-app-layout>
