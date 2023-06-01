<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoSalarioModel extends Model
{
    use HasFactory;
    protected $table = 'tipo_salarios';
    protected $fillabel = ['tipo', 'status'];
}
