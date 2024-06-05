<?php

namespace App\Http\Controllers;

use App\Models\TimeModel;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    public function index()
    {
        $time = TimeModel::all();

        return response()->json($time);
    }
    
    public function show($sport_id)
    {
        // Buscar todos los horarios para un deporte específico
        $times = TimeModel::where('sport_id', $sport_id)->get();
    
        return response()->json($times);
    }
    
}