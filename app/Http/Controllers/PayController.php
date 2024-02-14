<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class PayController extends Controller
{
    public function index()
    {
        return view('pay.index');
    }

    public function generate_code()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $code = '';
        $length = 6;

        // Генерируем случайный код
        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $code;
    }
    public function confirm()
    {
        if(isset($_COOKIE['order']))
        {
            $order=json_decode($_COOKIE['order']);
            $reservation_code=$this->generate_code();
            $data=
                [
                    'user_id'=>auth()->user()->id,
                    'price'=>$order->booking_price_rub,
                    'origin'=>$order->origin,
                    'destination'=>$order->destination,
                    'depart_date'=>date("Y-m-d",$order->depart_datetime),
                    'arrival_date'=>date("Y-m-d",$order->arrival_datetime),
                    'flight_num'=>$order->flight_num,
                    'data'=>$_COOKIE['order'],
                    'is_payed'=>true,
                    //Возможно, придется убрать
                    'is_confirmed'=>true,
                    'reservation_code'=>$reservation_code
                ];
            Order::create($data);
            unset($_COOKIE['order']);

            return redirect()->route('wait.index');
        }
        return redirect()->route('main.index');
    }
}
