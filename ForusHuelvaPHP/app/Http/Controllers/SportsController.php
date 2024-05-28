<?php

namespace App\Http\Controllers;

use App\Models\SportsModel;
use Illuminate\Http\Request;

class SportsController extends Controller
{
    public function index()
    {
        $sports = SportsModel::all();

        return response()->json($sports);
    }

    public function show($id)
    {
        $sport = SportsModel::findOrFail($id);
    
        return response()->json($sport);
    }
}