<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpleadoModel extends Model
{
    use HasFactory;
    protected $table = 'empleados';
    protected $fillabel = [
        'nombre', 'paterno', 'materno', 'fecha_nacimiento', 'numero_empleado', 'id_rol', 'status'
    ];
}
