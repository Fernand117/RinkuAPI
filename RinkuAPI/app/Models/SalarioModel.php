<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalarioModel extends Model
{
    use HasFactory;
    protected $table = 'salarios';
    protected $fillabel = [
        'salario', 'id_tipo', 'status'
    ];
}
