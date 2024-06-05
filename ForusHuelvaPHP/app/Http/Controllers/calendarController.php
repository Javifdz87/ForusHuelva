<?php

namespace App\Http\Controllers;

use App\Models\RentalFeesModel;
use Illuminate\Http\Request;

class calendarController extends Controller
{
    // Método para obtener todos los alquileres con los detalles del cliente, la cancha y el deporte asociados
    public function index()
    {
        
    }

    // Método para crear un nuevo alquiler
    public function store(Request $request)
    {
       
    }

    // Método para actualizar un alquiler existente por su ID
    public function update(Request $request, $id)
    {
        
    }

    // Método para eliminar un alquiler por su ID
    public function destroy($id)
    {
       
    }

    // Método para mostrar los detalles de un alquiler por el ID del cliente
    public function show($sportId)
    {
        // Buscar los alquileres por el ID del cliente y obtener los detalles del cliente, la pista y el deporte asociados
        $rent = RentalFeesModel::where('sport_Id', $sportId)
            ->with(['client:id,name,email', 'court:id,name,sport_id', 'sport:id,sport'])
            ->get();

        return response()->json($rent);
    }
}
