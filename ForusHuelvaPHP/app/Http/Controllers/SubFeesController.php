<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionFeesModel;
use Illuminate\Http\Request;

class SubFeesController extends Controller
{
    public function index()
    {
        $subs = SubscriptionFeesModel::with('client:id,name,email')->get();

        return response()->json($subs);
    }

    public function store(Request $request)
{
    $sub = SubscriptionFeesModel::create($request->all());

    return response()->json($sub, 201);
}

    public function update(Request $request, $id)
    {
        $sub = SubscriptionFeesModel::findOrFail($id);
        $sub->update($request->all());

        return response()->json($sub, 200);
    }

    public function destroy($id)
    {
        SubscriptionFeesModel::destroy($id);

        return response()->json(null, 204);
    }
}
