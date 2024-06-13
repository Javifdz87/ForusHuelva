<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    // Método para generar un código QR
    public function generate(Request $request)
    {
        // URL a la que se redirigirá al escanear el QR
        $redirectUrl = 'https://daw2.ieslamarisma.net/proyectos/2024/javifernandez/forushuelva/laravel/public/img/forus.jpg';

        // Generar el contenido del QR Code como una URL
        $qrContent = url($redirectUrl);

        // Crear el QR Code con la URL, tamaño 300x300 y color negro
        $qrCode = QrCode::size(300)->color(0, 0, 0)->generate($qrContent);

        // Devolver el QR Code como una respuesta con el tipo de contenido SVG
        return response($qrCode, 200)->header('Content-Type', 'image/svg+xml');
    }
}
