<?php

namespace App\Http\Controllers;

use App\Services\AirportService;
use Illuminate\Http\Request;
use App\Models\Order;

class BookingController extends Controller
{
    public function index()
    {
        $airportService = new AirportService();
        $airports = $airportService->getAllAirports();
        $airports=collect($airports);

        $request_all=\request()->all();
        $request=json_decode($request_all['request']);
        $result=json_decode($request_all['result']);
        //dd($result->transfers);
        setcookie('order_request', json_encode($request));
        setcookie('order_result', json_encode($result));

        unset($request->_token);
        $request->total_rub=($request->passengers->children+$request->passengers->adults+$request->passengers->infants)*699;
        $request->total_eur=($request->passengers->children+$request->passengers->adults+$request->passengers->infants)*14;
        return view('booking.index', compact(['request', 'result', 'airports']));
    }

    public function pay_page_post()
    {
        if(isset($_COOKIE['order']))
        {
            $request=json_decode($_COOKIE['order_request']);
            $result=json_decode($_COOKIE['order_result']);
            $user_info=\request()->all();
            if(!isset($_COOKIE['user_info']))
            {
                setcookie('user_info', json_encode($user_info));
            }
            $user_info=json_decode($_COOKIE['user_info']);


            $result_['request']=$request;
            $result_['result']=$result;
            $result_['user_info']=$user_info;
            $result_=json_encode($result_);

            $data=
                [
                    'user_id'=>auth()->user()->id,
                    'price'=>$user_info->total_rub,
                    'origin'=>$request->origin,
                    'destination'=>$request->destination,
                    'depart_date'=> date("Y-m-d H:i:s",$result->depart_datetime ),
                    'arrival_date'=> date("Y-m-d H:i:s",$result->arrival_datetime ),
                    'flight_num'=> $result->flight_num,
                    'data'=>$result_
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
            return view('booking.pay', compact(['request', 'user_info', 'result']));
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
