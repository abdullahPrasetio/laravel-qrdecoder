<?php

namespace App\Http\Controllers;

use Zxing\QrReader;
use Endroid\QrCode\QrCode;
use Illuminate\Http\Request;

class DecodeController extends Controller
{

    public function encode(Request $request)
    {
        $barcode = new \Com\Tecnick\Barcode\Barcode();
        $bobj = $barcode->getBarcodeObj(
            'QRCODE,H',                     // barcode type and additional comma-separated parameters
            $request->tag,          // data string to encode
            -4,                             // bar width (use absolute or negative value as multiplication factor)
            -4,                             // bar height (use absolute or negative value as multiplication factor)
            'red',                        // foreground color
            array(-2, -2, -2, -2)           // padding (use absolute or negative values as multiplication factors)
            )->setBackgroundColor('white'); // background color
        
        // output the barcode as HTML div (see other output formats in the documentation and examples)
        // $bobj->getHtmlDiv();
        dd($bobj->getPng());
        // $qrCode = new QrCode($request->tag);
        // $qrCode
        //     ->setSize(300)
        //     ->setErrorCorrection('high')
        //     ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
        //     ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
        //     // Path to your logo with transparency
        //     ->setLogo("logo.png")
        //     // Set the size of your logo, default is 48
        //     ->setLogoSize(98)
        //     ->setImageType(QrCode::IMAGE_TYPE_PNG)
        // ;

        // // Send output of the QRCode directly
        // header('Content-Type: '.$qrCode->getContentType());
        // $qrCode->render();
    }
    public function decode(Request $request)
    {
        $qrcode = new QrReader($request->tag);
        $text = $qrcode->text(); //return decoded text from QR Code
        dd($text);
    }
}
