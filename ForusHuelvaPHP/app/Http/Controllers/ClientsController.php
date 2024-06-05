<?php

namespace App\Http\Controllers;

use App\Models\ClientsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientsController extends Controller
{
    // Método para obtener todos los clientes
    public function index()
    {
        // Obtener todos los clientes desde la base de datos
        $clientes = ClientsModel::all();

        return response()->json($clientes);
    }

    // Método para crear un nuevo cliente
    public function store(Request $request)
    {
        // Obtenemos todos los datos del request
        $data = $request->all();

        // Encriptamos la contraseña con bcrypt antes de almacenarla en la base de datos
        $data['password'] = bcrypt($data['password']);

        // Creamos el cliente utilizando los datos proporcionados
        $cliente = ClientsModel::create($data);

        // Retornamos el cliente recién creado junto con el código de estado 201 (Created)
        return response()->json($cliente, 201);
    }

    // Método para actualizar un cliente existente
    public function update(Request $request, $id)
    {
        // Encontrar el cliente por su ID
        $client = ClientsModel::findOrFail($id);

        // Actualizar el cliente con los datos proporcionados
        $client->update($request->all());

        // Retornar el cliente actualizado junto con el código de estado 200
        return response()->json($client, 200);
    }

    // Método para eliminar un cliente
    public function destroy($id)
    {
        // Eliminar el cliente por su ID
        ClientsModel::destroy($id);

        // Retornar una respuesta exitosa sin contenido junto con el código de estado 204
        return response()->json(null, 204);
    }

    // Método para mostrar los detalles de un cliente por su email
    public function show($email)
    {
        // Buscar un cliente por su dirección de correo electrónico
        $cliente = ClientsModel::where('email', $email)->firstOrFail();

        return response()->json($cliente);
    }
}
