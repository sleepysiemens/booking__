<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;

class ExampleController extends Controller
{
    public function index()
    {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isRemoteEnabled', true);

        $path = base_path('public/img/qr-code/qrcode.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data_ = file_get_contents($path);
        $pic = 'data:image/' . $type . ';base64,' . base64_encode($data_);

        $data = [
            'pic' => $pic,
        ];

        $dompdf = new Dompdf($options);
        $html = view('ticket.example', $data)->render();
        $dompdf->loadHtml(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));

        // Рендеринг PDF
        $dompdf->render();

        // Возвращаем PDF как ответ
        return $dompdf->stream('Пример брони.pdf', array('Attachment' => false));
    }
}
