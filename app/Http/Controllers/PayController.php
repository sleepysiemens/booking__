<?php

namespace App\Http\Controllers;

use App\Jobs\UpdateOrderStatus;
use App\Models\PartnershipApplication;
use Illuminate\Http\Request;
use App\Models\Order;

class PayController extends Controller
{
    public function index()
    {
        if(isset($_COOKIE['order']))
        {
            $request=\request()->all();
            //dd($request);

            $order=json_decode($_COOKIE['order']);
            $API=
                [
                    'API_Key'=>'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1dWlkIjoiTVRRNU1UQT0iLCJ0eXBlIjoicHJvamVjdCIsInYiOiIyMTc2YjlmYzUxZGRjMjVkNzA2OGUzOWVjN2JjOTIxMTlhYjI1YjkwZTRiMDYxNzk4ZGQ0ZWE4ZWNmZmU2N2Y1IiwiZXhwIjo4ODEwNjUwNjIwMn0.AKlgP70-IOhFwPicUeiIH2jHeAwhvNTMrM2Z4LLuNNw',
                    'ShopID'=>'7QbiBLnzTncsKhJn',
                    'Secret'=>'B0IrZSr0tYON2FoAvxK2NqLHwv1HqxOBtcxe',
                    'price'=>$order->booking_price_rub,
                    'currency'=>'RUB',
                ];
            return view('pay.index', compact(['API', 'request']));
        }
        else
            return redirect()->route('main.index');
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

    public function generate_number()
    {
        $characters = '0123456789';
        $code = '';
        $length = 8;

        // Генерируем случайный код
        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $code;
    }
    public function confirm()
    {
        if(isset($_COOKIE['order']) and $_COOKIE['order']!=null)
        {
            $order=json_decode($_COOKIE['order']);

            if($order->user_data==null)
            {
                return redirect()->route('booking.get');
            }

            $reservation_code=$this->generate_code();

            $number=$this->generate_number();
            while (Order::query()->where('number','=',$number)->exists())
            {
                $number=$this->generate_number();
            }

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
                    'is_confirmed'=>false,
                    'reservation_code'=>$reservation_code,
                    'number'=>$number
                ];
            $order=Order::create($data);

            //partnership
            if(auth()->user()->ref_id!=null)
            {
                $partner=PartnershipApplication::query()->where('user_id','=',auth()->user()->ref_id)->first();
                $partner->update(['balance'=>$partner['balance']+10]);
            }

            UpdateOrderStatus::dispatch($order->id)->delay(now()->addSeconds(90));

            return redirect()->route('wait.index');
        }
        return redirect()->route('main.index');
    }

    public function fail()
    {
        return redirect()->route('booking.get');
        //return view('pay.fail');
    }
}
