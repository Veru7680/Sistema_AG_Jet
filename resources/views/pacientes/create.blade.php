@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto mt-10 p-6 bg-white dark:bg-gray-900 shadow-lg sm:rounded-xl">
    <h1 class="text-xl font-bold mb-6 text-gray-900 dark:text-white">Registrar Paciente</h1>

    <form action="{{ route('admin.pacientes.store') }}" method="POST" class="space-y-5">
        @csrf

        <!-- Nombre -->
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="nombre" id="nombre" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="nombre" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Nombre</label>
        </div>

        <!-- Apellido -->
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="apellido" id="apellido" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="apellido" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Apellido</label>
        </div>

        <!-- CI -->
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="ci" id="ci" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="ci" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Cédula de Identidad</label>
        </div>

        <!-- Fecha de nacimiento -->
        <div class="relative z-0 w-full mb-5 group">
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required />
            <label for="fecha_nacimiento" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Fecha de nacimiento</label>
        </div>

        <!-- Dirección -->
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="direccion" id="direccion" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="direccion" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Dirección</label>
        </div>

        <!-- Teléfono -->
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="telefono" id="telefono" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="telefono" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Teléfono</label>
        </div>

        <!-- Botón Guardar -->
        <button type="submit"
            class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl
                   focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800
                   font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full sm:w-auto">
            Guardar Paciente
        </button>
    </form>
</div>
@endsection
