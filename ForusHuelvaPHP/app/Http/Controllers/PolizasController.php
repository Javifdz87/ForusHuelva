<?php

namespace App\Http\Controllers;

use App\Models\ClientsModel;
use App\Models\PolizasModel;
use Illuminate\Http\Request;

class PolizasController extends Controller
{
    public function index()
    {
        $polizas = PolizasModel::with('client:id,name,email')->get();
        
    
        return response()->json($polizas);


    }

    public function store(Request $request)
    {
        $poliza = PolizasModel::create($request->all());

        return response()->json($poliza, 201);
    }

    public function update(Request $request, $id)
    {
        $poliza = PolizasModel::findOrFail($id);
        $poliza->update($request->all());

        return response()->json($poliza, 200);
    }

    public function destroy($id)
    {
        PolizasModel::destroy($id);

        return response()->json(null, 204);
    }
    public function show($id)
{
    $poliza = PolizasModel::findOrFail($id);
    
    return response()->json($poliza);
}

}
