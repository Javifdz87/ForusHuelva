<?php

namespace App\Http\Controllers;

use App\Models\ClientsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientsController extends Controller
{
    public function index()
    {
        $clientes = ClientsModel::all();

        return response()->json($clientes);
    }

    public function store(Request $request)
    {
        // Obtenemos todos los datos del request
        $data = $request->all();

        // Encriptamos la contraseña con bcrypt
        $data['password'] = bcrypt($data['password']);

        // Creamos el cliente
        $cliente = ClientsModel::create($data);

        return response()->json($cliente, 201);
    }

    public function update(Request $request, $id)
    {
        $client = ClientsModel::findOrFail($id);
        $client->update($request->all());

        return response()->json($client, 200);
    }

    public function destroy($id)
    {
        ClientsModel::destroy($id);

        return response()->json(null, 204);
    }

    public function show($email)
    {
        $cliente = ClientsModel::where('email', $email)->firstOrFail();

        return response()->json($cliente);
    }
}
