<x-app-layout>
    <a href="{{ route('psycho.users.index') }}" class="text-sm text-white bg-blue-500 hover:bg-blue-700 py-2 px-4 rounded">
        Volver
    </a>
    <div class="flex flex-col justify-center">
        <div class=" bg-white mx-auto w-full h-full max-w-xl p-8 mt-10 mb-18 border border-green-400 ">
            <h1 class="text-3xl font-bold text-center  text-black">{{ $student->name }}
                {{ $student->last_name }} {{ $student->last_name2 }}</h1>

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
</x-app-layout>
