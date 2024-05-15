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
            <form action="{{ route('psycho.users.search') }}"
                class="search-container rounded-xl flex flex-row p-4 mr-14 border-b-2">
                <input type="text" id="searchInput" name="searchInput" class="rounded-xl w-full"
                    placeholder="Search...">
                <select id="searchCategory" name="searchCategory" class="rounded-xl">
                    <option value="name">Nombre</option>
                    <option value="dni">DNI</option>
                    <option value="email">Email</option>
                </select>
                </input>
                <button><i class="material-icons text-3xl hover:text-customGreen">search</i></button>
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
                                    <option id="course-option" value="{{ $course->id }}">{{ $course->course_name }}
                                    </option>
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
                    @if (isset($filterByRole))
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
                    @if (isset($filterByRole))
                        @foreach ($users as $user)
                            <tr class="border-b bg-gray-100">
                                <td class="p-3 px-5">{{ $user->username }}</td>
                                <td class="p-3 px-5">{{ $user->email }}</td>
                                <td class="p-3 px-5">{{ $user->role->role_type ?? 'Sin rol' }}</td>
                                <td class="p-3 px-5">{{ $user->student->course->course_name ?? 'Sin curso' }}</td>
                                <td class="p-3 px-5 flex justify-end">
                                    <button type="button" 
                                        class="mr-3 text-sm text-black hover:bg-blue-500 hover:text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                        <a href="{{ route('psycho.users.edit', $user->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                    </button>

                                    <button type="button" wire:click="showModal" wire:loading.attr="disabled"

                                        class="text-sm text-red-500 hover:bg-red-500 hover:text-white  py-1 px-2 rounded focus:outline-none focus:shadow-outline"><svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>

                                    </button>





                                </td>
                            </tr>
                        @endforeach
                        {{ $users->appends(request()->input())->links() }}
                    @elseif (isset($filterByCourse))
                        @foreach ($students as $student)
                            <tr class="border-b bg-gray-100">
                                <td class="p-3 px-5">{{ $student->name }}</td>
                                <td class="p-3 px-5">{{ $student->last_name }} {{ $student->last_name2 }}</td>
                                <td class="p-3 px-5">{{ $student->email }}</td>
                                <td class="p-3 px-5">{{ $student->course->course_name ?? 'Sin curso' }}</td>
                                <td class="p-3 px-5 flex justify-end">
                                    <button type="button" href="{{ route('psycho.users.edit', $student->user_id) }}"
                                        class="mr-3 text-sm text-black hover:bg-blue-500 hover:text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                        <a href="{{ route('psycho.users.edit', $student->user_id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                    </button>

                                    <button onclick="Livewire.emit('openModal', '{{$student->user_id}}')"

                                        class="text-sm text-red-500 hover:bg-red-500 hover:text-white  py-1 px-2 rounded focus:outline-none focus:shadow-outline"><svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>

                                    </button>
                                    




                                </td>
                            </tr>
                        @endforeach
                    @elseif(isset($filterByName))
                        @foreach ($results as $result)
                            <tr class="border-b bg-gray-100">
                                <td class="p-3 px-5">{{ $result->username }}</td>
                                <td class="p-3 px-5">{{ $result->email }}</td>
                                <td class="p-3 px-5">{{ $result->role->role_type ?? 'Sin rol' }}</td>
                                <td class="p-3 px-5">{{ $result->student->course->course_name ?? 'Sin curso' }}</td>
                                <td class="p-3 px-5 flex justify-end">
                                    <button type="button" 
                                        class="mr-3 text-sm text-black hover:bg-blue-500 hover:text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                        <a href="{{ route('psycho.users.edit', $result->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                    </button>

                                    <button type="button" wire:click="showModal" wire:loading.attr="disabled"

                                        class="text-sm text-red-500 hover:bg-red-500 hover:text-white  py-1 px-2 rounded focus:outline-none focus:shadow-outline"><svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>

                                    </button>
                                    




                                </td>
                            </tr>
                        @endforeach
                     
                    @elseif (isset($filterByEmail))
                        @foreach ($results as $result)
                            <tr class="border-b bg-gray-100">
                                <td class="p-3 px-5">{{ $result->username }}</td>
                                <td class="p-3 px-5">{{ $result->email }}</td>
                                <td class="p-3 px-5">{{ $result->role->role_type ?? 'Sin rol' }}</td>
                                <td class="p-3 px-5">{{ $result->course->course_name ?? 'Sin curso' }}</td>
                                <td class="p-3 px-5 flex justify-end">
                                    <button type="button" 
                                        class="mr-3 text-sm text-black hover:bg-blue-500 hover:text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                        <a href="{{ route('psycho.users.edit', $result->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                    </button>

                                    <button type="button" wire:click="showModal" wire:loading.attr="disabled"

                                        class="text-sm text-red-500 hover:bg-red-500 hover:text-white  py-1 px-2 rounded focus:outline-none focus:shadow-outline"><svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>

                                    </button>





                                </td>
                            </tr>
                        @endforeach
                        
                    @elseif (isset($filterByDni))
                        @foreach ($results as $result)
                            <tr class="border-b bg-gray-100">
                                <td class="p-3 px-5">{{ $result->name }} {{ $result->last_name }}
                                    {{ $result->last_name2 }}</td>
                                <td class="p-3 px-5">{{ $result->email }}</td>
                                <td class="p-3 px-5">{{ $result->role->role_type ?? 'Sin rol' }}</td>
                                <td class="p-3 px-5">{{ $result->course->course_name ?? 'Sin curso' }}</td>
                                <td class="p-3 px-5 flex justify-end">
                                    <button type="button" 
                                        class="mr-3 text-sm text-black hover:bg-blue-500 hover:text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                        <a href="{{ route('psycho.users.edit', $result->user_id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                    </button>

                                    <button type="button" wire:click="showModal" wire:loading.attr="disabled"
                                        class="text-sm text-red-500 hover:bg-red-500 hover:text-white  py-1 px-2 rounded focus:outline-none focus:shadow-outline"><svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>

                                    </button>



                                </td>
                            </tr>
                        @endforeach
                        
                    @endif
                </tbody>
            </table>
            @if (isset($filterByRole))
            {{ $results->appends(request()->input())->links() }}
            @elseif (isset($filterByCourse))
            {{ $students->appends(request()->input())->links() }}
            @elseif(isset($filterByName))
            {{ $results->appends(request()->input())->links() }}
            @elseif (isset($filterByEmail))
            {{ $results->appends(request()->input())->links() }}
            @elseif (isset($filterByDni))
            {{ $results->appends(request()->input())->links() }}
            @endif
        </div>
    </div>
    <livewire:custom-modal-del wire:listeners="openModal" />
</x-app-layout>

