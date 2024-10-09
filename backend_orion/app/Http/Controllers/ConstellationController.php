<?php

namespace App\Http\Controllers;

use App\Models\Constellation;
use Illuminate\Http\Request;

class ConstellationController extends Controller
{
    /**
     * Mostrar una lista de constelaciones.
     */
    public function index()
    {
        $constellations = Constellation::with('stars')->get();
        return response()->json($constellations);
    }

    /**
     * Mostrar una constelación específica.
     */
    public function show($id)
    {
        $constellation = Constellation::with('stars')->findOrFail($id);
        return response()->json($constellation);
    }

    /**
     * Crear una nueva constelación.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|url',
            'difficulty_level_id' => 'required|exists:difficulty_levels,id',
        ]);

        $constellation = Constellation::create($validatedData);

        return response()->json($constellation, 201);
    }

    /**
     * Actualizar una constelación existente.
     */
    public function update(Request $request, $id)
    {
        $constellation = Constellation::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|url',
            'difficulty_level_id' => 'sometimes|required|exists:difficulty_levels,id',
        ]);

        $constellation->update($validatedData);

        return response()->json($constellation);
    }

    /**
     * Eliminar una constelación.
     */
    public function destroy($id)
    {
        $constellation = Constellation::findOrFail($id);
        $constellation->delete();

        return response()->json(null, 204);
    }
}
