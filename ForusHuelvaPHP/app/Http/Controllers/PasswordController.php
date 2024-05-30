<?php

namespace App\Http\Controllers;

use App\Models\ClientsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function index()
    {
        
    }

    public function store(Request $request)
    {
       
    }

    public function update(Request $request, $email)
    {
        $cliente = ClientsModel::where('email', $email)->firstOrFail();

        $data = $request->all();

        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        $cliente->update($data);

        return response()->json($cliente, 200);
    }

    public function destroy($id)
    {
        
    }

    public function show($email)
    {
       
    }
}
