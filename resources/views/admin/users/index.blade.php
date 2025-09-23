@extends('layouts.admin')

@section('content')

<div class="relative overflow-x-auto shadow-lg sm:rounded-xl bg-white dark:bg-gray-900 p-6 mt-20 max-h-[70vh] overflow-y-auto">
    <div class="flex flex-col md:flex-row items-center justify-between mb-6 space-y-3 md:space-y-0">
        <!-- Botón de acciones -->
        <div>
            <button
    type="button"
    onclick="window.location='{{ route('admin.users.create') }}'"
    class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl
           focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800
           font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
    Registrar Usuario
</button>

        </div>
        <!-- Buscador -->
        <div class="relative w-full md:w-80">
            <input type="text" id="table-search-users" placeholder="Buscar usuario..."
                class="block w-full text-xs p-2 pl-10 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-400 dark:text-gray-300" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-4.35-4.35M10.5 18a7.5 7.5 0 1 0 0-15 7.5 7.5 0 0 0 0 15z" />
                </svg>
            </div>
        </div>
    </div>

    <table class="w-full text-xs text-left text-gray-600 dark:text-gray-300 rounded-lg overflow-hidden">
        <thead class="bg-gradient-to-r from-blue-500 to-blue-600 text-white uppercase">
            <tr>
                <th class="p-2"><input type="checkbox" class="accent-blue-600"></th>
                <th class="px-3 py-2">Rol</th>
                <th class="px-3 py-2">Nombre</th>
                <th class="px-3 py-2">Email</th>
               <!--  <th class="px-3 py-2">Password</th> -->
                <th class="px-3 py-2">Foto</th>
                <th class="px-3 py-2">Creado</th>
                <th class="px-3 py-2">Actualizado</th>
                <th class="px-3 py-2">Acción</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($users as $user)
            <tr class="hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                <td class="p-2"><input type="checkbox" value="{{ $user->id }}" class="accent-blue-600"></td>
                <td class="px-3 py-2 font-medium">{{ $user->role->nombre_rol ?? 'N/A' }}</td>
                <td class="px-3 py-2">{{ $user->name }}</td>
                <td class="px-3 py-2">{{ $user->email }}</td>
               <!-- <td class="px-3 py-2 truncate max-w-xs">{{ $user->password }}</td>-->
                <td class="px-3 py-2">
                    @if($user->profile_photo_path)
                    <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="Foto de perfil"
                        class="w-8 h-8 rounded-full object-cover border">
                    @else
                    <span class="text-gray-400">N/A</span>
                    @endif
                </td>
                <td class="px-3 py-2">{{ $user->created_at?->format('d/m/Y') ?? 'N/A' }}</td>
                <td class="px-3 py-2">{{ $user->updated_at?->format('d/m/Y') ?? 'N/A' }}</td>
                <td class="px-3 py-2 flex flex-col">
                    <a href="{{ route('admin.users.edit', $user->id) }}"
                    class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-2 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-sm px-2 py-1 text-center mb-1">
                    Editar
                    </a>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-2 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-2 py-1 text-center">
                            Eliminar
                        </button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
