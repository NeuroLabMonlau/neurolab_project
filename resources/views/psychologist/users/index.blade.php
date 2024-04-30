<x-app-layout>
    <div class="p-4 text-gray-600 flex flex-col gap-4">
        <div class="border-b-2">
            <h1 class="text-3xl font-bold">Gestión de usuarios</h1>
        </div>
        <div>
            <h3 class="text-2xl font-semibold">Busqueda de usuarios</h3>
            <p class="text-sm">Realiza una busqueda de usuarios</p>
        </div>
        <div>
            <form action="{{ route('psycho.users.search') }}" class="search-container rounded-xl flex flex-row p-4 mr-14 border-b-2">
            <input type="text" id="searchInput" name="searchInput" class="rounded-xl w-full" placeholder="Search...">
            <select id="searchCategory" name="searchCategory" class="rounded-xl">
                <option value="name">Nombre</option>
                <option value="dni">DNI</option>
                <option value="email">Email</option>
            </select>
            </input>
            <button ><i class="material-icons text-3xl hover:text-customGreen">search</i></button>
        </form>
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
                    <form action="{{ route('psycho.users.course') }}" method="post">
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
        <div class="px-3 py-4 flex flex-col justify-center" id="results">
            <table class="w-full text-md bg-white shadow-md rounded mb-4">
                <tbody>
                    @if(isset($filterByRole))
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">Nombre</th>
                        <th class="text-left p-3 px-5">Email</th>
                        <th class="text-left p-3 px-5">Rol</th>
                        <th class="text-left p-3 px-5">Curso</th>
                        <th></th>
                    </tr>
                    @elseif (isset($filterByCourse)) 
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">Nombre</th>
                        <th class="text-left p-3 px-5">Apellidos</th>
                        <th class="text-left p-3 px-5">Email</th>
                        <th class="text-left p-3 px-5">Curso</th>
                        <th></th>
                    </tr>
                    @elseif(isset($filterByName))
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">Nombre</th>
                        <th class="text-left p-3 px-5">Email</th>
                        <th class="text-left p-3 px-5">Rol</th>
                        <th class="text-left p-3 px-5">Curso</th>
                        <th></th>
                    </tr>
                    @elseif (isset($filterByEmail))
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">Nombre</th>
                        <th class="text-left p-3 px-5">Email</th>
                        <th class="text-left p-3 px-5">Rol</th>
                        <th class="text-left p-3 px-5">Curso</th>
                        <th></th>
                    </tr>
                    @elseif (isset($filterByDni))
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">Nombre</th>
                        <th class="text-left p-3 px-5">Email</th>
                        <th class="text-left p-3 px-5">Rol</th>
                        <th class="text-left p-3 px-5">Curso</th>
                        <th></th>
                    </tr>
                    @endif
                    <!-- Listado -->
                    @if(isset($filterByRole))
                    @foreach($users as $user)
                    <tr class="border-b bg-gray-100">
                        <td class="p-3 px-5">{{ $user->username }}</td>
                        <td class="p-3 px-5">{{ $user->email }}</td>
                        <td class="p-3 px-5">{{ $user->role->role_type ?? 'Sin rol' }}</td>
                        <td class="p-3 px-5">{{ $user->student->course->course_name ?? 'Sin curso'  }}</td>
                        <td class="p-3 px-5 flex justify-end">
                            <button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-800 bg-custom text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</button>
                            <button type="button" class="mr-3 text-sm bg-customGreen hover:bg-green-800 bg-custom text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button>
                            <button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                    {{$users->appends(request()->input())->links()}}
                    @elseif (isset($filterByCourse)) 
                    @foreach($students as $student)
                    <tr class="border-b bg-gray-100">
                        <td class="p-3 px-5">{{ $student->name }}</td>
                        <td class="p-3 px-5">{{ $student->last_name }} {{ $student->last_name2 }}</td>
                        <td class="p-3 px-5">{{ $student->email }}</td>
                        <td class="p-3 px-5">{{ $student->course->course_name ?? 'Sin curso'  }}</td>
                        <td class="p-3 px-5 flex justify-end">
                            <button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-800 bg-custom text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</button>
                            <button type="button" class="mr-3 text-sm bg-customGreen hover:bg-green-800 bg-custom text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button>
                            <button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                    {{$students->appends(request()->input())->links()}}
                    
                    @elseif(isset($filterByName))
                    @foreach($results as $result)
                    <tr class="border-b bg-gray-100">
                        <td class="p-3 px-5">{{ $result->username }}</td>
                        <td class="p-3 px-5">{{ $result->email }}</td>
                        <td class="p-3 px-5">{{ $result->role->role_type ?? 'Sin rol' }}</td>
                        <td class="p-3 px-5">{{ $result->student->course->course_name ?? 'Sin curso'   }}</td>
                        <td class="p-3 px-5 flex justify-end">
                            <button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-800 bg-custom text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</button>
                            <button type="button" class="mr-3 text-sm bg-customGreen hover:bg-green-800 bg-custom text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button>
                            <button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                    {{$results->appends(request()->input())->links()}}
                    @elseif (isset($filterByEmail)) 
                    @foreach($results as $result)
                    <tr class="border-b bg-gray-100">
                        <td class="p-3 px-5">{{ $result->username }}</td>
                        <td class="p-3 px-5">{{ $result->email }}</td>
                        <td class="p-3 px-5">{{ $result->role->role_type ?? 'Sin rol' }}</td>
                        <td class="p-3 px-5">{{ $result->course->course_name ?? 'Sin curso'   }}</td>
                        <td class="p-3 px-5 flex justify-end">
                            <button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-800 bg-custom text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</button>
                            <button type="button" class="mr-3 text-sm bg-customGreen hover:bg-green-800 bg-custom text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button>
                            <button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                    {{$results->appends(request()->input())->links()}}
                    @elseif (isset($filterByDni))
                    @foreach($results as $result)
                    <tr class="border-b bg-gray-100">
                        <td class="p-3 px-5">{{ $result->name }} {{ $result->last_name }} {{ $result->last_name2 }}</td>
                        <td class="p-3 px-5">{{ $result->email }}</td>
                        <td class="p-3 px-5">{{ $result->role->role_type ?? 'Sin rol' }}</td>
                        <td class="p-3 px-5">{{ $result->course->course_name ?? 'Sin curso'   }}</td>
                        <td class="p-3 px-5 flex justify-end">
                            <button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-800 bg-custom text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</button>
                            <button type="button" class="mr-3 text-sm bg-customGreen hover:bg-green-800 bg-custom text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Save</button>
                            <button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                    {{$results->appends(request()->input())->links()}}
                    @endif
                </tbody>
            </table>

        </div>
    </div>

</x-app-layout>