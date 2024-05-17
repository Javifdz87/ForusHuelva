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
}