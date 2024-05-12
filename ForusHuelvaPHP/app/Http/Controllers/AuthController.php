<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use App\Models\ClientsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // Obtener los datos de la solicitud
        $email = $request->input('email');
        $password = $request->input('password');

        // Buscar al usuario por su correo electrónico en la tabla UsersModel
        $user = UsersModel::where('email', $email)->first();

        // Si no se encuentra el usuario en UsersModel, buscar en ClientsModel
        if (!$user) {
            $user = ClientsModel::where('email', $email)->first();
        }

        // Verificar si se encontró al usuario y si la contraseña es correcta
        if ($user && Hash::check($password, $user->password)) {
            // Autenticación exitosa, el usuario existe y las credenciales son válidas
            Auth::login($user);
            // Devolver el usuario junto con el campo role en la respuesta JSON
            return response()->json(['user' => $user, 'role' => $user instanceof UsersModel], 200);
        } else {
            // Autenticación fallida, las credenciales son incorrectas
            return response()->json(['error' => 'Credenciales incorrectas'], 401);
        }
    }
}