@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto mt-10 p-6 bg-white dark:bg-gray-900 shadow-lg sm:rounded-xl">
    <h1 class="text-xl font-bold mb-6 text-gray-900 dark:text-white">Registrar Usuario</h1>

    <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf

        <!-- Rol -->
        <div class="relative z-0 w-full mb-5 group">
            <select name="id_rol" id="role" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required>
                <option value="" disabled selected>Selecciona un rol</option>
                @foreach($roles as $rol)
                    <option value="{{ $rol->id_rol }}">{{ $rol->nombre_rol }}</option>
                @endforeach
            </select>
            <label for="role" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Rol</label>
        </div>

        <!-- Nombre -->
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="name" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="name" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Nombre</label>
        </div>

        <!-- Email -->
        <div class="relative z-0 w-full mb-5 group">
            <input type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="email" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Email</label>
        </div>

        <!-- Password -->
        <div class="relative z-0 w-full mb-5 group">
            <input type="password" name="password" id="password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="password" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Password</label>
        </div>

        <!-- Confirmar Password -->
        <div class="relative z-0 w-full mb-5 group">
            <input type="password" name="password_confirmation" id="password_confirmation" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="password_confirmation" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Confirmar Password</label>
        </div>

        <!-- Foto de perfil -->
        <div class="relative z-0 w-full mb-5 group">
            <input type="file" name="profile_photo_path" id="photo" class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white peer" />
            <label for="photo" class="absolute text-sm text-gray-500 dark:text-gray-400 top-3 -z-10">Foto de perfil</label>
        </div>

        <!-- Botón Guardar -->
        <button type="submit"
            class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl
                   focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800
                   font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full sm:w-auto">
            Guardar
        </button>
    </form>
</div>
@endsection
