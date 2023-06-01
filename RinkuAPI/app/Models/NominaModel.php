<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NominaModel extends Model
{
    use HasFactory;
    protected $table = 'nominas';
    protected $fillabel = [
        'mes', 'entregas', 'horas_trabajadas', 'sueldo_bruto', 'sueldo_neto', 'id_empleado', 'status'
    ];
}
