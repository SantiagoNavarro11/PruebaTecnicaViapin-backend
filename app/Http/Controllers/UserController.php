<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\UserRequest;

/**
 * @OA\Tag(name="Users", description="Gestión de colaboradores y usuarios")
 */
class UserController extends Controller
{
    /**
     * Recupera y lista todos los colaboradores del sistema.
     *
     * @OA\Get(
     * path="/users",
     * tags={"Users"},
     * summary="Listar todos los colaboradores",
     * @OA\Response(
     * response=200,
     * description="Listado exitoso de colaboradores.",
     * @OA\JsonContent(
     * type="object",
     * @OA\Property(property="success", type="boolean", example=true),
     * @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/User"))
     * )
     * )
     * )
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        // El ORM (Eloquent) se encarga de la lógica de la base de datos (SRP).
        return response()->json(['success' => true, 'data' => User::all()]);
    }

    /**
     * Crea un nuevo colaborador en la base de datos.
     * La validación se delega a UserRequest (SRP).
     *
     * @OA\Post(
     * path="/users",
     * tags={"Users"},
     * summary="Crear un nuevo colaborador",
     * @OA\RequestBody(required=true, @OA\JsonContent(ref="#/components/schemas/UserRequest")),
     * @OA\Response(response=201, description="Colaborador creado exitosamente."),
     * @OA\Response(response=422, description="Error de validación.")
     * )
     *
     * @param UserRequest $request
     * @return JsonResponse
     */
    public function store(UserRequest $request): JsonResponse
    {
        $user = User::create($request->validated());
        
        // Se utiliza el código de estado 201 (Created) para la creación exitosa.
        return response()->json(['success' => true, 'data' => $user, 'message' => 'Usuario creado'], 201);
    }

    /**
     * Muestra la información detallada de un colaborador específico.
     *
     * @OA\Get(
     * path="/users/{id}",
     * tags={"Users"},
     * summary="Obtener detalles de un colaborador",
     * @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     * @OA\Response(response=200, description="Detalles del colaborador."),
     * @OA\Response(response=404, description="Colaborador no encontrado.")
     * )
     *
     * @param int $id Identificador del colaborador.
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $user = User::find($id);
        
        // Manejo de errores estándar de la API: 404 Not Found.
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Usuario no encontrado'], 404);
        }
        
        return response()->json(['success' => true, 'data' => $user]);
    }

    /**
     * Actualiza los datos de un colaborador existente.
     *
     * @OA\Put(
     * path="/users/{id}",
     * tags={"Users"},
     * summary="Actualizar datos de un colaborador",
     * @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     * @OA\RequestBody(required=true, @OA\JsonContent(ref="#/components/schemas/UserRequest")),
     * @OA\Response(response=200, description="Colaborador actualizado exitosamente."),
     * @OA\Response(response=404, description="Colaborador no encontrado."),
     * @OA\Response(response=422, description="Error de validación.")
     * )
     *
     * @param UserRequest $request
     * @param int $id Identificador del colaborador.
     * @return JsonResponse
     */
    public function update(UserRequest $request, $id): JsonResponse
    {
        $user = User::find($id);
        
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Usuario no encontrado'], 404);
        }
        
        $user->update($request->validated());
        
        return response()->json(['success' => true, 'data' => $user, 'message' => 'Usuario actualizado']);
    }

    /**
     * Elimina un colaborador del sistema.
     *
     * @OA\Delete(
     * path="/users/{id}",
     * tags={"Users"},
     * summary="Eliminar un colaborador",
     * @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     * @OA\Response(response=204, description="Colaborador eliminado exitosamente."),
     * @OA\Response(response=404, description="Colaborador no encontrado.")
     * )
     *
     * @param int $id Identificador del colaborador.
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $user = User::find($id);
        
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Usuario no encontrado'], 404);
        }
        
        $user->delete();
        
        // Se utiliza el código de estado 204 No Content para eliminaciones exitosas.
        return response()->json(['success' => true, 'message' => 'Usuario eliminado'], 204);
    }
}