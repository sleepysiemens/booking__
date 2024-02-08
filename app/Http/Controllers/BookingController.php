<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class BookingController extends Controller
{
    public function index()
    {
        $request=\request()->all();
        setcookie('order', json_encode($request));

        unset($request['_token']);
        $request['total_rub']=($request['children_amount']+$request['adults_amount']+$request['infants_amount'])*699;
        $request['total_eur']=($request['children_amount']+$request['adults_amount']+$request['infants_amount'])*14;
        return view('booking.index', compact(['request']));
    }

    public function pay_page_post()
    {
        if(isset($_COOKIE['order']))
        {
            $request=json_decode($_COOKIE['order']);
            $user_info=\request()->all();
            if(!isset($_COOKIE['user_info']))
            {
                setcookie('user_info', json_encode($user_info));
            }
            $user_info=json_decode($_COOKIE['user_info']);
            $data=
                [
                    'user_id'=>auth()->user()->id,
                    'price'=>$user_info->total_rub,
                    'origin'=>$request->origin,
                    'destination'=>$request->destination,
                    'depart_date'=> date("Y-m-d H:i:s",$request->depart_datetime ),
                    'arrival_date'=> date("Y-m-d H:i:s",$request->arrival_datetime ),
                    'flight_num'=> $request->flight_num,
                ];
            if(!isset($request->order_number))
            {
                $new_order=Order::create($data);
                $order_num=$new_order->id;

                $request->order_number=$order_num;
                unset($_COOKIE['order']);
                setcookie('order', json_encode($request));
            }
            else
            {
                $order_num=$request->order_number;
            }
            //dd($request);
            return view('booking.pay', compact(['request', 'user_info']));
        }
        return redirect()->route('main.index');
    }

    public function pay_page_get()
    {
        if(isset($_COOKIE['order']))
        {
            if(isset($_COOKIE['user_info']))
            {
                $request=json_decode($_COOKIE['order']);
                $user_info=json_decode($_COOKIE['user_info']);

                return view('booking.pay', compact(['request', 'user_info']));
            }
        }
        return redirect()->route('main.index');

    }
}
