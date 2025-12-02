<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'nombre_completo',
        'email',
        'departamento',
        'telefono',
        'fecha_registro',
        'estado',
    ];

    protected $hidden = [
        // 'password', si no usamos contraseñas en la prueba
    ];
}
