<?php

namespace App\Http\Controllers;

use App\Models\RentalFeesModel;
use Illuminate\Http\Request;

class RentFeesController extends Controller
{
    public function index()
{
    $rent = RentalFeesModel::with('client:id,name,email', 'sport:id,sport', 'court:id,name,sport_id')->get();
    

    return response()->json($rent);
}


    public function store(Request $request)
{
    $rent = RentalFeesModel::create($request->all());

    return response()->json($rent, 201);
}

    public function update(Request $request, $id)
    {
        $rent = RentalFeesModel::findOrFail($id);
        $rent->update($request->all());

        return response()->json($rent, 200);
    }

    public function destroy($id)
    {
        RentalFeesModel::destroy($id);

        return response()->json(null, 204);
    }
}
