<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class QRCodeController extends Controller
{
     public function generate(Request $request)
    {
        $qrCode = QrCode::format('png')->generate('Contenido del QR Code');
        return response($qrCode)->header('Content-Type', 'image/png');
    }
}
