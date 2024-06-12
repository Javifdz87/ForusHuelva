<?php

namespace App\Http\Controllers;

use App\Models\RentalFeesModel;
use Illuminate\Http\Request;

class RentFeesController extends Controller
{
    // Método para obtener todos los alquileres con los detalles del cliente, la cancha y el deporte asociados
    public function index()
    {
        // Obtener todos los alquileres con los detalles del cliente, la cancha y el deporte asociados
        $rent = RentalFeesModel::with('client:id,name,email', 'court:id,name,sport_id', 'sport:id,sport', 'match:id,team_a,team_b, result, description')->get();

        return response()->json($rent);
    }

    // Método para crear un nuevo alquiler
    public function store(Request $request)
    {
        // Crear un nuevo alquiler con los datos proporcionados
        $rent = RentalFeesModel::create($request->all());

        // Retornar el nuevo alquiler junto con el código de estado 201
        return response()->json($rent, 201);
    }

    // Método para actualizar un alquiler existente por su ID
    public function update(Request $request, $id)
    {
        // Encontrar el alquiler por su ID
        $rent = RentalFeesModel::findOrFail($id);

        // Actualizar los datos del alquiler con los datos proporcionados
        $rent->update($request->all());

        // Retornar el alquiler actualizado junto con el código de estado 200
        return response()->json($rent, 200);
    }

    // Método para eliminar un alquiler por su ID
    public function destroy($id)
    {
        // Eliminar el alquiler por su ID
        RentalFeesModel::destroy($id);

        // Retornar una respuesta exitosa sin contenido junto con el código de estado 204
        return response()->json(null, 204);
    }

    // Método para mostrar los detalles de un alquiler por el ID del cliente
    public function show($clientId)
    {
        // Buscar los alquileres por el ID del cliente y obtener los detalles del cliente, la pista y el deporte asociados
        $rent = RentalFeesModel::where('client_id', $clientId)
            ->with(['client:id,name,email', 'court:id,name,sport_id', 'sport:id,sport'])
            ->get();

        return response()->json($rent);
    }
}
