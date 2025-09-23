<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    // Si quieres proteger con auth: uncomment:
    // public function __construct() { $this->middleware('auth'); }

    public function index()
{
    $pacientes = Paciente::orderBy('id_paciente', 'desc')->paginate(10);
    return view('pacientes.index', compact('pacientes'));
}


    public function create()
    {
        return view('pacientes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'ci' => 'required|string|max:20|unique:pacientes,ci',
            'fecha_nacimiento' => 'required|date',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:20',
        ]);

        Paciente::create($data);

        return redirect()->route('admin.pacientes.index')
                 ->with('success', 'Paciente registrado correctamente');
    }

    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    public function update(Request $request, Paciente $paciente)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'ci' => 'required|string|max:20|unique:pacientes,ci,'.$paciente->id_paciente.',id_paciente',
            'fecha_nacimiento' => 'required|date',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:20',
        ]);

        $paciente->update($data);

        return redirect()->route('admin.pacientes.index')->with('success','Paciente actualizado correctamente.');
    }

    public function destroy(Paciente $paciente)
    {
        $paciente->delete();
        return redirect()->route('admin.pacientes.index')->with('success','Paciente eliminado.');
    }
}
