<?php

namespace App\Http\Controllers;
use App\Models\Rol; // <-- agregar esto

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
      public function index()
    {
         $users = User::with('role')->get(); // Trae también el rol
    return view('admin.users.index', compact('users'));
    }

       // Mostrar formulario de edición
    public function edit(User $user)
{
    $roles = Rol::all(); // Para el select de roles
    return view('admin.users.edit', compact('user', 'roles'));
}


    // Actualizar usuario
    public function update(Request $request, User $user)
{
    $data = $request->validate([
        'id_rol' => 'required|exists:roles,id_rol',
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'password' => 'nullable|string|min:6',
        'profile_photo_path' => 'nullable|image|max:10240', // 10MB
    ]);

    // Si se envió contraseña, encriptarla
    if (!empty($data['password'])) {
        $data['password'] = bcrypt($data['password']);
    } else {
        unset($data['password']); // No cambiar contraseña
    }

    // Guardar foto si se envió
    if ($request->hasFile('profile_photo_path')) {
        $data['profile_photo_path'] = $request->file('profile_photo_path')->store('profiles', 'public');
    }

    $user->update($data);

    // Redirigir al listado de usuarios con mensaje de éxito
    return redirect()->route('admin.users.index')->with('success', 'Usuario actualizado correctamente.');
}


    // Eliminar usuario
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Usuario eliminado correctamente.');
    }

    public function create()
{
    $roles = Rol::all();
    return view('admin.users.create', compact('roles'));
}

// Guardar nuevo usuario
public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
        'id_rol' => 'required|exists:roles,id_rol',
        'profile_photo_path' => 'nullable|image|max:10240',
    ]);

    $data['password'] = bcrypt($data['password']);

    if ($request->hasFile('profile_photo_path')) {
        $data['profile_photo_path'] = $request->file('profile_photo_path')->store('profiles', 'public');
    }

    User::create($data);

    return redirect()->route('admin.users.index')->with('success', 'Usuario registrado correctamente.');
}
}
