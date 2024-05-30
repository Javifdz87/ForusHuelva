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

    public function update(Request $request, $email)
    {
        $cliente = ClientsModel::where('email', $email)->firstOrFail();
        $data = $request->all();

        // Verificamos la contraseña
        if (!Hash::check($data['password'], $cliente->password)) {
            return response()->json(['error' => 'Contraseña incorrecta'], 401);
        }

        // Actualizamos la cuenta bancaria
        if (isset($data['new_bank_account'])) {
            $cliente->bank_account = $data['new_bank_account'];
        }

        $cliente->save();

        return response()->json($cliente, 200);
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
