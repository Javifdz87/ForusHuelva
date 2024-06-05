<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionFeesModel;
use Illuminate\Http\Request;

class SubFeesController extends Controller
{
    // Método para obtener todas las suscripciones con los detalles del cliente asociado
    public function index()
    {
        // Obtener todas las suscripciones con los detalles del cliente asociado
        $subs = SubscriptionFeesModel::with('client:id,name,email')->get();

        return response()->json($subs);
    }

    // Método para crear una nueva suscripción
    public function store(Request $request)
    {
        // Crear una nueva suscripción con los datos proporcionados
        $sub = SubscriptionFeesModel::create($request->all());

        // Retornar la nueva suscripción junto con el código de estado 201
        return response()->json($sub, 201);
    }

    // Método para actualizar una suscripción existente por client_id en lugar de id
    public function update(Request $request, $clientId)
    {
        // Buscar la suscripción por client_id en lugar de id
        $sub = SubscriptionFeesModel::where('client_id', $clientId)->first();

        // Actualizar los datos de la suscripción con los datos proporcionados
        $sub->update($request->all());

        // Retornar la suscripción actualizada junto con el código de estado 200
        return response()->json($sub, 200);
    }

    // Método para eliminar una suscripción
    public function destroy($id)
    {
        // Eliminar la suscripción por su ID
        SubscriptionFeesModel::destroy($id);

        // Retornar una respuesta exitosa sin contenido junto con el código de estado 204
        return response()->json(null, 204);
    }

    // Método para mostrar los detalles de una suscripción por el client_id
    public function show($clientId)
    {
        // Buscar la suscripción por client_id
        $sub = SubscriptionFeesModel::where('client_id', $clientId)->first();

        return response()->json($sub);
    }
}
