<x-app-layout>
    <div class="p-4 text-gray-600 flex flex-col gap-4">
        <div class="border-b-2">
            <h1 class="text-3xl font-bold">Gestión de usuarios</h1>
        </div>
        <div>
            <h3 class="text-2xl font-semibold">Filtrado de usuarios</h3>
            <p class="text-sm">Realiza un filtrado de usuarios</p>
        </div>
        <div class="border-b-2 flex flex-col p-4">
            <div class="flex flex-wrap items-center gap-40">
                <div>
                    <h4>Rol de usuarios</h4>
                    <form action="{{ route('psycho.users.role') }}" method="post">
                        @csrf
                        <div class="flex gap-2 items-center">
                            <select name="role" id="role" class="rounded-xl">
                                <option value="">Seleccione una opción...</option>
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->role_type }}</option>
                                @endforeach
                            </select>
                            <button type="submit">
                                <i class="material-icons text-3xl hover:text-customGreen">search</i>
                            </button>
                        </div>
                    </form>
                </div>
                <div>
                    <h4>Curso</h4>
                    <form action="" method="post">
                        @csrf
                        <div class="flex gap-2 items-center">
                            <select name="course" id="course" class="rounded-xl">
                                <option value="">Seleccione una opción...</option>
                                @foreach ($courses as $course)
                                <option id="course-option" value="{{ $course->id }}">{{ $course->course_name }}</option>
                                @endforeach
                            </select>
                            <button type="submit">
                                <i class="material-icons text-3xl hover:text-customGreen">search</i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="text-gray-600">
        <div class="p-4 flex">
            <h1 class="text-3xl">Usuarios</h1>
        </div>
        <div class="px-3 py-4 flex justify-center">
            <table class="w-full text-md bg-white shadow-md rounded mb-4">
                <tbody>
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">Nombre</th>
                        <th class="text-left p-3 px-5">Email</th>
                        <th class="text-left p-3 px-5">Rol</th>
                        <th class="text-left p-3 px-5">Curso</th>
                        <th></th>
                    </tr>
                    <!-- Listado admin -->
                    @if(isset($filterByRole) && $filterByRole == 1)
                    @foreach($users as $user)
                    @if($user->role_id == 1)
                    <tr class="border-b bg-gray-100">
                        <td class="p-3 px-5">{{ $user->username }}</td>
                        <td class="p-3 px-5">{{ $user->email }}</td>
                        <td class="p-3 px-5">Admin</td>
                        <td class="p-3 px-5">Sin curso</td>
                        <td class="p-3 px-5 flex justify-end">
                            <button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-800 bg-custom text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</button>
                            <button type="button" class="mr-3 text-sm bg-customGreen hover:bg-green-800 bg-custom text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button>
                            <button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                    @endif

                    <!-- Listado teachers -->
                    @if(isset($filterByRole) && $filterByRole == 2)
                    @foreach($users as $user)
                    @if($user->role_id == 2)
                    <tr class="border-b bg-gray-100">
                        <td class="p-3 px-5">{{ $user->username }}</td>
                        <td class="p-3 px-5">{{ $user->email }}</td>
                        <td class="p-3 px-5">Profesor</td>
                        <td class="p-3 px-5">Sin curso</td>
                        <td class="p-3 px-5 flex justify-end">
                            <button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-800 bg-custom text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</button>
                            <button type="button" class="mr-3 text-sm bg-customGreen hover:bg-green-800 bg-custom text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button>
                            <button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                    @endif

                    <!-- Listado Students -->
                    @if(isset($filterByRole) && $filterByRole == 3)
                    @foreach ($students as $student)
                    <tr class="border-b bg-gray-100">
                        <td class="p-3 px-5">{{ $student->name }} {{ $student->last_name }} {{ $student->last_name2 }}</td>
                        <td class="p-3 px-5">{{ $student->email }}</td>
                        @foreach($users as $user)
                        @if($student->user_id == $user->id)
                        @foreach($roles as $role)
                        @if($user->role_id == $role->id)
                        <td class="p-3 px-5">{{ $role->role_type ? $role->role_type  : 'Sin rol' }}</td>
                        @endif
                        @endforeach
                        @endif
                        @endforeach
                        @foreach($courses as $course)
                        @if($student->course_id == $course->id)
                        <td class="p-3 px-5">{{ $course->course_name }}</td>
                        @endif
                        @endforeach
                        <td class="p-3 px-5 flex justify-end">
                            <button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-800 bg-custom text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</button>
                            <button type="button" class="mr-3 text-sm bg-customGreen hover:bg-green-800 bg-custom text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button>
                            <button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                    @endif

                    <!-- Listado tutors -->
                    @if(isset($filterByRole) && $filterByRole == 4)
                    @foreach($tutors as $tutor)
                    <tr class="border-b bg-gray-100">
                        <td class="p-3 px-5">{{ $tutor->name }} {{ $tutor->lastname }}</td>
                        <td class="p-3 px-5">{{ $tutor->email }}</td>
                        <td class="p-3 px-5">Tutor</td>
                        <td class="p-3 px-5">Sin curso</td>
                        <td class="p-3 px-5 flex justify-end">
                            <button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-800 bg-custom text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</button>
                            <button type="button" class="mr-3 text-sm bg-customGreen hover:bg-green-800 bg-custom text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button>
                            <button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>