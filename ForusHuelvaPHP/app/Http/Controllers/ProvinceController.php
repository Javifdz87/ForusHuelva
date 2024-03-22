<?php

namespace App\Http\Controllers;

use App\Models\ProvinceModel;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function index()
    {
        $provinces = ProvinceModel::all();

        return response()->json($provinces);


    }

}
