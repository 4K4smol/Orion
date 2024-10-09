<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Mostrar el perfil del usuario autenticado.
     */
    public function show()
    {
        return response()->json(Auth::user());
    }

    /**
     * Actualizar el perfil del usuario autenticado.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|nullable|string|min:8|confirmed',
        ]);

        if (isset($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }


        return response()->json($user);
    }
}
