<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QrCodeScannerController extends Controller
{
    public function qr_code_scanner()
    {
        return view('user.qr-code-scanner');
    }
}
