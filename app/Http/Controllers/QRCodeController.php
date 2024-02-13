<?php

namespace App\Http\Controllers;

use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Writer;
use Illuminate\Http\Request;

class QRCodeController extends Controller
{
    public function index()
    {
        // URL, на который должен вести QR-код
        $url = url('/pnrcheck');

        // Создание QR-кода
        $rendererStyle = new RendererStyle(400);
        $renderer = new ImageRenderer($rendererStyle, new ImagickImageBackEnd());
        $writer = new Writer($renderer);
        $data = $writer->writeString($url);

        // Вывод изображения QR-кода
        return response($data)->header('Content-Type', 'image/png');
    }
}

