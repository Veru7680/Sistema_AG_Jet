cat > resources/views/pacientes/form.blade.php <<'BLADE'
@csrf

<div class="mb-3">
    <label>Nombre</label>
    <input type="text" name="nombre" value="{{ old('nombre', $paciente->nombre ?? '') }}" class="form-control">
    @error('nombre') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label>Apellido</label>
    <input type="text" name="apellido" value="{{ old('apellido', $paciente->apellido ?? '') }}" class="form-control">
    @error('apellido') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label>CI</label>
    <input type="text" name="ci" value="{{ old('ci', $paciente->ci ?? '') }}" class="form-control">
    @error('ci') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label>Fecha de Nacimiento</label>
    <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $paciente->fecha_nacimiento ?? '') }}" class="form-control">
    @error('fecha_nacimiento') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label>Dirección</label>
    <input type="text" name="direccion" value="{{ old('direccion', $paciente->direccion ?? '') }}" class="form-control">
</div>

<div class="mb-3">
    <label>Teléfono</label>
    <input type="text" name="telefono" value="{{ old('telefono', $paciente->telefono ?? '') }}" class="form-control">
</div>

<button type="submit" class="btn btn-primary">Guardar</button>
BLADE
