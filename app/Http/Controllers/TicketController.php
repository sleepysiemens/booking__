<?php

namespace App\Http\Controllers;

use App\Models\Airports;
use App\Models\Order;

use Dompdf\Dompdf;
use Dompdf\Options;
class TicketController extends Controller
{
    public function index($params)
    {
        $params=explode('-',$params);
        $order=$params[0];

        $passenger=null;
        if(isset($params[1]))
            $passenger=$params[1];

        //dd($passenger);


        $order=Order::query()->where('number','=',$order)->first();
        if($order->created_at->addDays(7)->isPast())
            return redirect()->route('main.index');
        $airports = Airports::all();

        $cookie=json_decode($order->data);

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isRemoteEnabled', true);

        $path=base_path('public/img/qr-code/qrcode.png');
        //dd($path);
        $type=pathinfo($path, PATHINFO_EXTENSION);
        $data_=file_get_contents($path);
        $pic='data:image/'.$type.';base64,'.base64_encode($data_);

        $data = [
            'airports'=>$airports,
            'cookie'=>$cookie,
            'order'=>$order,
            'pic'=>$pic,
            'passenger'=>$passenger,
        ];

        $dompdf = new Dompdf($options);
        $html = view('ticket.ticket', $data)->render();
        $dompdf->loadHtml(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8')); // Указываем кодировку

        // Рендеринг PDF
        $dompdf->render();

        // Возвращаем PDF как ответ
        return $dompdf->stream('Бронирование билета #'.$order->number.'.pdf', array('Attachment' => false));
    }

    public function download($params)
    {
        $params=explode('-',$params);
        $order=$params[0];

        $passenger=null;
        if(isset($params[1]))
            $passenger=$params[1];

        $order=Order::query()->where('number','=',$order)->first();
        if($order->created_at->addDays(7)->isPast())
            return redirect()->route('main.index');
        $airports = Airports::all();

        $cookie=json_decode($order->data);

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isRemoteEnabled', true);

        $path=base_path('public/img/qr-code/qrcode.png');
        //dd($path);
        $type=pathinfo($path, PATHINFO_EXTENSION);
        $data_=file_get_contents($path);
        $pic='data:image/'.$type.';base64,'.base64_encode($data_);

        $data = [
            'airports'=>$airports,
            'cookie'=>$cookie,
            'order'=>$order,
            'pic'=>$pic,
            'passenger'=>$passenger,
        ];

        $dompdf = new Dompdf($options);
        $html = view('ticket.ticket', $data)->render();
        $dompdf->loadHtml(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8')); // Указываем кодировку

        // Рендеринг PDF
        $dompdf->render();

        // Возвращаем PDF как ответ
        return $dompdf->stream('Бронирование билета #'.$order->number.'.pdf', array('Attachment' => true));
    }
}
