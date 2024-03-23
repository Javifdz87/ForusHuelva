<?php

namespace App\Http\Controllers;

use App\Models\CourtsModel;
use Illuminate\Http\Request;

class CourtsController extends Controller
{
    public function index()
    {
        $courts = CourtsModel::all();

        return response()->json($courts);
    }

    public function store(Request $request)
{
 
}

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }}
