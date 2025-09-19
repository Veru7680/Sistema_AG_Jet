<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'roles';   // nombre de la tabla en la BD
    protected $primaryKey = 'id_rol'; // clave primaria

    protected $fillable = [
        'nombre_rol',
    ];

    // Relación opcional con User
    public function users()
    {
        return $this->hasMany(User::class, 'id_rol');
    }

    
}
