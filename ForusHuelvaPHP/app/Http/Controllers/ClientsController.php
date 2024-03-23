<?php

namespace App\Http\Controllers;

use App\Models\ClientsModel;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {
        $clientes = ClientsModel::all();

        return response()->json($clientes);
    }

    public function store(Request $request)
{
    $cliente = ClientsModel::create($request->all());

    return response()->json($cliente, 201);
}

    public function update(Request $request, $id)
    {
        $cliente = ClientsModel::findOrFail($id);
        $cliente->update($request->all());

        return response()->json($cliente, 200);
    }

    public function destroy($id)
    {
       ClientsModel::destroy($id);

        return response()->json(null, 204);
    }
}