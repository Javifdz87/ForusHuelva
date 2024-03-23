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

}

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
 
    }
}
