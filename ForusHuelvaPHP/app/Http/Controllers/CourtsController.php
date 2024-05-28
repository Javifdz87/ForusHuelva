<?php

namespace App\Http\Controllers;

use App\Models\CourtsModel;
use Illuminate\Http\Request;

class CourtsController extends Controller
{
    public function index()
    {
        $courts = CourtsModel::with('sport:id,sport')->get();

        return response()->json($courts);
    }

    public function store(Request $request)
{
    $court = CourtsModel::create($request->all());

    return response()->json($court, 201);
}

    public function update(Request $request, $id)
    {
        $court = CourtsModel::findOrFail($id);
        $court->update($request->all());

        return response()->json($court, 200);
    }

    public function destroy($id)
    {
        CourtsModel::destroy($id);

        return response()->json(null, 204);
    }

    public function show($id)
    {
        $court = CourtsModel::findOrFail($id);
    
        return response()->json($court);
    }

}