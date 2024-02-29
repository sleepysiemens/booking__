<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ConfirmTicketController extends Controller
{
    public function index()
    {
        return view('confirm_ticket.index');
    }

    public function check()
    {
        $pnr=\request()->pnr;
        $order_id=null;
        $check=Order::query()
            ->join('users','users.id','=','orders.user_id')
            ->where('users.surname','=',\request()->surname)
            ->where('orders.reservation_code','=',\request()->pnr)->exists();

        $order=[];
        $data=[];
        if($check)
        {
            $order=Order::query()
                ->join('users','users.id','=','orders.user_id')
                ->where('users.surname','=',\request()->surname)
                ->where('orders.reservation_code','=',\request()->pnr)->select('orders.*')->first();

            $data=json_decode($order->data);
            $check=$order->is_confirmed;
        }

        //dd($data);

        return view('confirm_ticket.index',compact(['check', 'order', 'pnr', 'data']));
    }
}
