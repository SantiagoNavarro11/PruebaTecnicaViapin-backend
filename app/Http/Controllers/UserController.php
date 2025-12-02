<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;


class UserController extends Controller
{
    public function index() {
        return response()->json(['success' => true, 'data' => User::all()]);
    }

    public function store(UserRequest $request) {
        $user = User::create($request->validated());
        return response()->json(['success' => true, 'data' => $user, 'message' => 'Usuario creado']);
    }

    public function show($id) {
        $user = User::find($id);
        if (!$user) return response()->json(['success' => false, 'message' => 'Usuario no encontrado'], 404);
        return response()->json(['success' => true, 'data' => $user]);
    }

    public function update(UserRequest $request, $id) {
        $user = User::find($id);
        if (!$user) return response()->json(['success' => false, 'message' => 'Usuario no encontrado'], 404);
        $user->update($request->validated());
        return response()->json(['success' => true, 'data' => $user, 'message' => 'Usuario actualizado']);
    }

    public function destroy($id) {
        $user = User::find($id);
        if (!$user) return response()->json(['success' => false, 'message' => 'Usuario no encontrado'], 404);
        $user->delete();
        return response()->json(['success' => true, 'message' => 'Usuario eliminado']);
    }
}
