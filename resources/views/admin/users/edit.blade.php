@extends('layouts.admin')

@section('content')

<div class="max-w-3xl mx-auto mt-20 p-6 bg-white dark:bg-gray-900 shadow-lg sm:rounded-xl">
    <h2 class="text-xl font-semibold mb-6 text-gray-900 dark:text-white">Editar Usuario</h2>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')

        <!-- Rol -->
        <div class="mb-5">
            <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rol</label>
            <select name="id_rol" id="role" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                <option value="" disabled>Selecciona un rol</option>
                @foreach($roles as $rol)
                    <option value="{{ $rol->id_rol }}" {{ $user->id_rol == $rol->id_rol ? 'selected' : '' }}>{{ $rol->nombre_rol }}</option>
                @endforeach
            </select>
        </div>

        <!-- Nombre -->
        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required />
        </div>

        <!-- Email -->
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required />
        </div>

        <!-- Password -->
        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input type="password" name="password" id="password" placeholder="Dejar vacío si no quieres cambiar" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
        </div>

        <!-- Foto -->
        <div class="mb-5">
            <label for="photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto de perfil</label>
            <input type="file" name="profile_photo_path" id="photo" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" />
            @if($user->profile_photo_path)
                <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="Foto de perfil" class="w-12 h-12 mt-2 rounded-full object-cover border">
            @endif
        </div>

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Actualizar
        </button>
    </form>
</div>

@endsection
