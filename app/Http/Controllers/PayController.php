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

    public function confirm()
    {
        if(isset($_COOKIE['order']))
        {
            $order=json_decode($_COOKIE['order']);
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
                    'is_payed'=>true
                ];
            Order::create($data);
            unset($_COOKIE['order']);

            return redirect()->route('wait.index');
        }
        return redirect()->route('main.index');
    }
}
