<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // cambiar a false si quieres control de permisos
    }

    public function rules(): array
    {
        return [
            'nombre_completo' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->route('id'),
            'departamento' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'fecha_registro' => 'required|date',
            'estado' => 'required|in:Activo,Inactivo',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre_completo.required' => 'El nombre completo es obligatorio',
            'email.required' => 'El correo es obligatorio',
            'email.email' => 'Formato de correo inválido',
            'email.unique' => 'El correo ya existe',
            'departamento.required' => 'El departamento es obligatorio',
            'telefono.required' => 'El teléfono es obligatorio',
            'fecha_registro.required' => 'La fecha de registro es obligatoria',
            'estado.in' => 'El estado debe ser Activo o Inactivo',
        ];
    }
}
