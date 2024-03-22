<?php

namespace App\Http\Controllers;

use App\Models\ClientsModel;
use App\Models\PolizasModel;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function index()
    {
        // Obtener todos los clientes y todas las pólizas
        $clientes = ClientsModel::all();
        $polizas = PolizasModel::all();

        // Devolver una respuesta JSON con todos los clientes y todas las pólizas
        return response()->json([
            'clientes' => $clientes,
            'polizas' => $polizas,
        ]);
    }
}