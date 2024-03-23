<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionFeesModel;
use Illuminate\Http\Request;

class SubFeesController extends Controller
{
    public function index()
    {
        $subs = SubscriptionFeesModel::all();

        return response()->json($subs);
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
