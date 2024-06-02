<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class QRCodeController extends Controller
{
     public function generate(Request $request)
    {
        // Generar contenido único para el QR Code
        $uniqueContent = 'Bienvenido a Forus Huelva ' . now()->timestamp;
        $qrCode = QrCode::size(300)->color(0, 0, 0)->generate($uniqueContent);
        return response($qrCode, 200)->header('Content-Type', 'image/svg+xml');
    }
}
