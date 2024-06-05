<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class QRCodeController extends Controller
{
    // Método para generar un código QR
    public function generate(Request $request)
    {
        // Generar contenido único para el QR Code utilizando la fecha y hora actual
        $uniqueContent = 'Bienvenido a Forus Huelva ' . now()->timestamp;

        // Crear el QR Code con el contenido único, tamaño 300x300 y color negro
        $qrCode = QrCode::size(300)->color(0, 0, 0)->generate($uniqueContent);

        // Devolver el QR Code como una respuesta con el tipo de contenido SVG
        return response($qrCode, 200)->header('Content-Type', 'image/svg+xml');
    }
}
