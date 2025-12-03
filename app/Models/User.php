<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * @package App\Models
 * @property int $id
 * @property string $nombre_completo
 * @property string $email
 * @property string $departamento
 * @property string $telefono
 * @property string $fecha_registro
 * @property string $estado (Activo/Inactivo)
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class User extends Authenticatable
{
    use HasFactory;

    /**
     * Nombre de la tabla de la base de datos.
     * @var string
     */
    protected $table = 'users';

    /**
     * Atributos que son asignables masivamente (Mass Assignable).
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre_completo',
        'email',
        'departamento',
        'telefono',
        'fecha_registro',
        'estado',
    ];

    /**
     * Atributos que deben ser ocultados para las serializaciones (JSON).
     * En una aplicación real, se usaría para campos sensibles como 'password' o 'remember_token'.
     * @var array<int, string>
     */
    protected $hidden = [
        // 'password', 'remember_token'
    ];
    
    /**
     * Atributos que deben ser convertidos a tipos nativos.
     * Esto asegura que la fecha_registro sea tratada como un objeto de fecha en PHP.
     * @var array<string, string>
     */
    protected $casts = [
        'fecha_registro' => 'date:Y-m-d', // Formato de fecha para serialización
    ];
}