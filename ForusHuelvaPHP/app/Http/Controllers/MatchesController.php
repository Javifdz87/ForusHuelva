<?php

namespace App\Http\Controllers;

use App\Models\MatchesModel;
use Illuminate\Http\Request;

class MatchesController extends Controller
{
    public function index()
    {
        $matches = MatchesModel::all();


        return response()->json($matches);
    }

    public function store(Request $request)
{
    $match = MatchesModel::create($request->all());

    return response()->json($match, 201);
}

    public function update(Request $request, $id)
    {
        $match = MatchesModel::findOrFail($id);
        $match->update($request->all());

        return response()->json($match, 200);
    }

    public function destroy($id)
    {
        MatchesModel::destroy($id);

        return response()->json(null, 204);
    }

    public function show($id)
    {
        $match = MatchesModel::findOrFail($id);
    
        return response()->json($match);
    }

}