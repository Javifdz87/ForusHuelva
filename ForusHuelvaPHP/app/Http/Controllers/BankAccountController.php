<?php

namespace App\Http\Controllers;

use App\Models\ClientsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BankAccountController extends Controller
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

        // Verificamos la contraseña
        if (!Hash::check($data['password'], $cliente->password)) {
            return response()->json(['error' => 'Contraseña incorrecta'], 401);
        }

        // Actualizamos la cuenta bancaria
        if (isset($data['new_bank_account'])) {
            $cliente->bank_account = $data['new_bank_account'];
        }

        $cliente->save();

        return response()->json($cliente, 200);
    }

    public function destroy($id)
    {
        
    }

    public function show($email)
    {
       
    }
}
