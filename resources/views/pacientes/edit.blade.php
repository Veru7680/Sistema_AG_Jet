@extends('layouts.admin')

@section('content')

<div class="max-w-3xl mx-auto mt-20 p-6 bg-white dark:bg-gray-900 shadow-lg sm:rounded-xl">
    <h2 class="text-xl font-semibold mb-6 text-gray-900 dark:text-white">Editar Paciente</h2>

    <form action="{{ route('admin.pacientes.update', $paciente->id_paciente) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <!-- Nombre -->
        <div class="mb-5">
            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{ $paciente->nombre }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required />
        </div>

        <!-- Apellido -->
        <div class="mb-5">
            <label for="apellido" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido</label>
            <input type="text" name="apellido" id="apellido" value="{{ $paciente->apellido }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required />
        </div>

        <!-- CI -->
        <div class="mb-5">
            <label for="ci" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CI</label>
            <input type="text" name="ci" id="ci" value="{{ $paciente->ci }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required />
        </div>

        <!-- Fecha de Nacimiento -->
        <div class="mb-5">
            <label for="fecha_nacimiento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ $paciente->fecha_nacimiento->format('Y-m-d') }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required />
        </div>

        <!-- Dirección -->
        <div class="mb-5">
            <label for="direccion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dirección</label>
            <input type="text" name="direccion" id="direccion" value="{{ $paciente->direccion }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
        </div>

        <!-- Teléfono -->
        <div class="mb-5">
            <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono</label>
            <input type="text" name="telefono" id="telefono" value="{{ $paciente->telefono }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
        </div>

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Actualizar
        </button>
    </form>
</div>

@endsection
