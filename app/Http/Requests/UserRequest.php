<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Clase de Petición para validar la creación y actualización
 * de los datos de un colaborador.
 *
 * Esta clase implementa el Principio de Responsabilidad Única (SRP)
 * al aislar la lógica de validación del controlador.
 */
class UserRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para hacer esta solicitud.
     * En este caso, se permite el acceso público (si no hay autenticación).
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // En una aplicación real con autenticación (ej. Sanctum o Passport),
        // aquí se verificaría si el usuario tiene permisos para crear/editar usuarios.
        return true;
    }

    /**
     * Define las reglas de validación que se aplicarán a la solicitud.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            // Validación básica de cadena y longitud
            'nombre_completo' => 'required|string|max:255',
            
            // Validación de email: requerido, formato email, y validación de unicidad inteligente.
            // La cláusula unique ignora el ID si se está haciendo un PUT (actualización).
            'email' => [
                'required',
                'email',
                'unique:users,email,' . $this->route('id'),
            ],
            
            // Validación de cadena y longitud
            'departamento' => 'required|string|max:255',
            
            // Validación de teléfono
            'telefono' => 'required|string|max:20',
            
            // Validación de fecha: requerido y formato de fecha válido
            'fecha_registro' => 'required|date',
            
            // Validación de estado: debe ser exactamente 'Activo' o 'Inactivo'
            'estado' => 'required|in:Activo,Inactivo',
        ];
    }

    /**
     * Define los mensajes de error personalizados para las reglas de validación.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nombre_completo.required' => 'El nombre completo es obligatorio',
            // ... (Resto de mensajes personalizados para claridad)
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