<x-app-layout>
    <div class="flex flex-col w-full h-full gap-10 p-4 ">
        <div class="border-b-2 w-full">
            <h1 class="text-3xl font-bold text-gray-600">Gestión de juegos</h1>
        </div>
        <div class="flex flex-wrap w-full p-4 gap-24 justify-center items-center">
            <div class="flex flex-col w-1/3 bg-white rounded-lg shadow-lg p-6 space-y-4 border-2 ">
                <h3 class="text-2xl font-bold text-gray-800">Gestión de Categorías</h3>
                <p class="text-sm text-gray-600">Aquí podrás gestionar las categorías de los juegos, crear nuevas y ver las existentes.</p>
                <div class="flex justify-center space-x-4">
                    <a href="{{ route('psycho.games.categories.create') }}" class="flex items-center justify-center w-1/2 px-4 py-2 bg-green-600 text-white rounded-md hover:bg-customGreen hover:text-blue-950  transition duration-300 ease-in-out">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        <span>Crear</span>
                    </a>
                    <a href="{{ route('psycho.games.categories.index') }}" class="flex items-center justify-center w-1/2 px-4 py-2 bg-green-600 text-white rounded-md hover:bg-customGreen hover:text-blue-950 transition duration-300 ease-in-out">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                        </svg>
                        <span>Ver</span>
                    </a>
                </div>
            </div>
 
            <div class="flex flex-col w-1/3 bg-white rounded-lg shadow-lg p-6 space-y-4 border-2 ">
                <h3 class="text-2xl font-bold text-gray-800">Gestión de Juegos</h3>
                <p class="text-sm text-gray-600">Aquí podrás gestionar las categorías de los juegos, crear nuevas o ver y editar las existentes.</p>
                <div class="flex justify-center space-x-4">
                    <a href="{{ route('psycho.games.create') }}" class="flex items-center justify-center w-1/2 px-4 py-2 bg-green-600 text-white rounded-md hover:bg-customGreen hover:text-blue-950 transition duration-300 ease-in-out">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        <span>Crear</span>
                    </a>
                    <a href="{{ route('psycho.games.games.index') }}" class="flex items-center justify-center w-1/2 px-4 py-2 bg-green-600 text-white rounded-md hover:bg-customGreen hover:text-blue-950 transition duration-300 ease-in-out">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                        </svg>
                        <span>Ver</span>
                    </a>
                    <a href="{{ route('psycho.games.parameters.store') }}" class="flex items-center justify-center w-1/2 px-4 py-2 bg-green-600 text-white rounded-md hover:bg-customGreen hover:text-blue-950 transition duration-300 ease-in-out">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                        </svg>
                        <span>Parametrizar</span>
                    </a>
                </div>
            </div>

            <div class="flex flex-col w-1/3 bg-white rounded-lg shadow-lg p-6 space-y-4 border-2 ">
                <h3 class="text-2xl font-bold text-gray-800">Gestión de Tests</h3>
                <p class="text-sm text-gray-600">Aquí podrás gestionar los tests, crear nuevos o ver y editar los existentes.</p>
                <div class="flex justify-center space-x-4">
                    <a href="{{ route('psycho.games.tests.create') }}" class="flex items-center justify-center w-1/2 px-4 py-2 bg-green-600 text-white rounded-md hover:bg-customGreen hover:text-blue-950 transition duration-300 ease-in-out">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        <span>Crear</span>
                    </a>
                    <a href="{{ route('psycho.games.tests.index') }}" class="flex items-center justify-center w-1/2 px-4 py-2 bg-green-600 text-white rounded-md hover:bg-customGreen hover:text-blue-950 transition duration-300 ease-in-out">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                        </svg>
                        <span>Ver</span>
                    </a>
                    <a href="{{ route('psycho.games.tests.add-games.store') }}" class="flex items-center justify-center w-1/2 px-4 py-2 bg-green-600 text-white rounded-md hover:bg-customGreen hover:text-blue-950 transition duration-300 ease-in-out">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                        </svg>
                        <span>Añadir juego a test</span>
                    </a>
                </div>
            </div>
        
        </div>
    </div>
</x-app-layout>