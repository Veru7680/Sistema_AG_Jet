@extends('layouts.admin')

@section('content')

<div class="relative overflow-x-auo shadow-lg sm:rounded-xl bg-white dark:bg-gray-100 p-6 mt-20 max-h-[70vh] overflow-y-auto">

    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-200 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex flex-col md:flex-row items-center justify-between mb-6 space-y-3 md:space-y-0">
        <!-- Botón de acciones -->
        <div>
            <button
                type="button"
                onclick="window.location='{{ route('admin.pacientes.create') }}'"
                class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl
                       focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800
                       font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                Registrar Paciente
            </button>
        </div>

        <!-- Buscador -->
        <div class="relative w-full md:w-80">
            <input type="text" id="table-search-pacientes" placeholder="Buscar paciente..."
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
                <th class="px-3 py-2">Nombre</th>
                <th class="px-3 py-2">Apellido</th>
                <th class="px-3 py-2">CI</th>
                <th class="px-3 py-2">Fecha Nacimiento</th>
                <th class="px-3 py-2">Dirección</th>
                <th class="px-3 py-2">Teléfono</th>
                <th class="px-3 py-2">Acción</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($pacientes as $paciente)
            <tr class="hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                <td class="p-2"><input type="checkbox" value="{{ $paciente->id_paciente }}" class="accent-blue-600"></td>
                <td class="px-3 py-2 font-medium">{{ $paciente->nombre }}</td>
                <td class="px-3 py-2">{{ $paciente->apellido }}</td>
                <td class="px-3 py-2">{{ $paciente->ci }}</td>
                <td class="px-3 py-2">{{ \Carbon\Carbon::parse($paciente->fecha_nacimiento)->format('d/m/Y') }}</td>
                <td class="px-3 py-2">{{ $paciente->direccion ?? '-' }}</td>
                <td class="px-3 py-2">{{ $paciente->telefono ?? '-' }}</td>
                <td class="px-3 py-2 flex flex-col">
                    <a href="{{ route('admin.pacientes.edit', $paciente->id_paciente) }}"
                       class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l focus:ring-2 focus:outline-none focus:ring-lime-200 font-medium rounded-lg text-sm px-2 py-1 text-center mb-1">
                       Editar
                    </a>
                    <form action="{{ route('admin.pacientes.destroy', $paciente->id_paciente) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-2 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-2 py-1 text-center"
                            onclick="return confirm('¿Eliminar paciente?')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $pacientes->links() }} {{-- Paginación --}}
    </div>
</div>

@endsection
