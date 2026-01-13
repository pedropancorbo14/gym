<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\TokenResource;
use App\Models\User;
use App\Support\JsonApiError;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $request->validated();

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'errors' => JsonApiError::make(
                    '401',
                    'Credenciales incorrectas',
                    'Las credenciales proporcionadas no son válidas.'
                ),
            ], 401);
        }

        if (! $user) {
            return response()->json([
                'errors' => JsonApiError::make(
                    '404',
                    'Usuario no encontrado',
                    'El usuario no fue encontrado.'
                ),
            ], 404);
        }

        return new TokenResource($user->createToken('api')->plainTextToken, $user);
    }
}
