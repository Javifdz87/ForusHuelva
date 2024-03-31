<?php

namespace App\Http\Controllers;

use App\Models\rentalFeesModel;
use Illuminate\Http\Request;

class RentFeesController extends Controller
{
    public function index()
    {
        $rentals = rentalFeesModel::all();

        return response()->json($rentals);
    }

    public function store(Request $request)
{
    $rent = rentalFeesModel::create($request->all());

    return response()->json($rent, 201);
}

    public function update(Request $request, $id)
    {
        $rent = rentalFeesModel::findOrFail($id);
        $rent->update($request->all());

        return response()->json($rent, 200);
    }

    public function destroy($id)
    {
        rentalFeesModel::destroy($id);

        return response()->json(null, 204);
    }
}
