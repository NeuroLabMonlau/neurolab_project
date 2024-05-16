<x-app-layout>
    <a href="{{ route('psycho.users.index') }}"
        class="text-sm text-white bg-blue-500 hover:bg-blue-700 py-2 px-4 rounded">
        Volver
    </a>
    @if (session('error'))
        <div class="bg-red-500 text-white p-4 rounded-lg text-center mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if (!session('edit'))
    <div class="flex flex-col justify-center">

        <div class=" bg-white mx-auto w-full h-full max-w-xl p-8 mt-10 mb-18 border border-green-400 ">

            <h1 class="text-3xl font-bold text-center  text-black">{{ $student->name }}
                {{ $student->last_name }} {{ $student->last_name2 }}</h1>
            <a href="{{ route('psycho.users.enabledit', $student->user_id )}}" class="text-sm text-black py-2 px-4 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>
            </a>
            <div class="flex justify-center">
                <img class=" mt-5 w-48 h-48 rounded-full" src="{{ $user->profile_photo_url }}"
                    alt="{{ $user->username }}" />
            </div>
            <h1 class="text-3xl font-bold mb-2 text-black">Información personal</h1>
            <p class=" mb-2 text-black">CURSO: {{ $course->course_name }}</p>
            <p class=" mb-2 text-black">IDALU: {{ $student->idalu }}</p>
            <p class=" mb-2 text-black">DNI: {{ $student->dni_nif }}</p>
            <p class=" mb-2 text-black">FECHA NACIMIENTO: {{ $student->date_of_birth }}</p>
            <p class=" mb-2 text-black">EMAIL: {{ $student->email }}</p>
            <p class=" mb-2 text-black">CALLE: {{ $address->public_road }}</p>
            <p class=" mb-2 text-black">CP: {{ $address->cp }}</p>
            <p class=" mb-2 text-black">PROVINCIA: {{ $address->province }}</p>
        </div>
    </div>
    @elseif (session('edit'))
    
        <form  method="post"
            class="w-full max-w-md mx-auto">
            @csrf
            @method('PUT')
            <div class="bg-white shadow-lg rounded-lg p-6 space-y-4 border border-gray-300">
                <div class="flex flex-col space-y-4">
                    <label for="name" class="text-gray-600">Nombre</label>
                    <input type="text" name="name" id="name" class="border border-gray-300 rounded-md p-2 focus:outline-none focus:border-blue-500"
                        value="{{ $student->name }}" placeholder="{{ $student->name }}">
                </div>
                <div class="flex flex-col space-y-4">
                    <label for="last_name" class="text-gray-600">Primer Apellido</label>
                    <input type="text" name="last_name" id="last_name" class="border border-gray-300 rounded-md p-2 focus:outline-none focus:border-blue-500"
                        value="{{ $student->last_name }}" placeholder="{{ $student->last_name }}">
                </div>
                <div class="flex flex-col space-y-4">
                    <label for="last_name2" class="text-gray-300">Segundo Apellido</label>
                    <input type="text" name="last_name2" id="last_name2" class="border border-gray-300 rounded-md p-2 focus:outline-none focus:border-blue-500"
                        value="{{ $student->last_name2 }}" placeholder="{{ $student->last_name2 }}">
                </div>
                <div class="flex flex-col space-y-4">
                    <label for="idalu" class="text-gray-600">IDALU</label>
                    <input type="text" name="idalu" id="idalu" class="border border-gray-300 rounded-md p-2 focus:outline-none focus:border-blue-500"
                        value="{{ $student->idalu }}" placeholder="{{ $student->idalu }}">
                </div>
                <div class="flex flex-col space-y-4">
                    <label for="dni_nif" class="text-gray-600">DNI</label>
                    <input type="text" name="dni_nif" id="dni_nif" class="border border-gray-300 rounded-md p-2 focus:outline-none focus:border-blue-500"
                        value="{{ $student->dni_nif }}" placeholder="{{ $student->dni_nif }}">
                </div>
                <div class="flex flex-col space-y-4">
                    <label for="date_of_birth" class="text-gray-600">Fecha de Nacimiento</label>
                    <input type="date" name="date_of_birth" id="date_of_birth" class="border border-gray-300 rounded-md p-2 focus:outline-none focus:border-blue-500"
                        value="{{ $student->date_of_birth }}" placeholder="{{ $student->date_of_birth }}">
                </div>
                <div class="flex flex-col space-y-4">
                    <label for="email" class="text-gray-600">Email</label>
                    <input type="email" name="email" id="email" class="border border-gray-300 rounded-md p-2 focus:outline-none focus:border-blue-500"
                        value="{{ $student->email }}" placeholder="{{ $student->email }}">
                </div>
                <div class="flex flex-col space-y-4">
                    <label for="public_road" class="text-gray-600">Calle</label>
                    <input type="text" name="public_road" id="public_road" class="border border-gray-300 rounded-md p-2 focus:outline-none focus:border-blue-500"
                        value="{{ $address->public_road }}" placeholder="{{ $address->public_road }}">
                </div>
                <div class="flex flex-col space-y-4">
                    <label for="cp" class="text-gray-600">CP</label>
                    <input type="text" name="cp" id="cp" class="border border-gray-300 rounded-md p-2 focus:outline-none focus:border-blue-500"
                        value="{{ $address->cp }}" placeholder="{{ $address->cp }}">
                </div>
                <div class="flex flex-col space-y-4">
                    <label for="province" class="text-gray-600">Provincia</label>
                    <input type="text" name="province" id="province" class="border border-gray-300 rounded-md p-2 focus:outline-none focus:border-blue-500"
                        value="{{ $address->province }}" placeholder="{{ $address->province }}">
                </div>
                <input type="number" name="user_id" id="user_id" value="{{ $student->user_id }}" hidden>
                <input type="number" name="address_id" id="address_id" value="{{ $address->id }}" hidden>
                <input type="number" name="course_id" id="course_id" value="{{ $course->id }}" hidden>
                <div class="flex justify-between">
                    <button type="submit"
                        class="w-1/2 px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:bg-green-700 transition duration-300 ease-in-out">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Guardar
                    </button>
                    <a href="{{ route('psycho.users.edit', $student->user_id) }}"
                        class="w-1/2 px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 focus:outline-none focus:bg-gray-400 transition duration-300 ease-in-out">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                        </svg>
                        Cancelar
                    </a>
                </div>

    @endif
</x-app-layout>
