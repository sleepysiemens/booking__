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
        $order_id=null;
        $check=Order::query()
            ->join('users','users.id','=','orders.user_id')
            ->where('users.surname','=',\request()->surname)
            ->where('orders.reservation_code','=',\request()->pnr)->exists();

        if($check)
        {
            $order_id=Order::query()
                ->join('users','users.id','=','orders.user_id')
                ->where('users.surname','=',\request()->surname)
                ->where('orders.reservation_code','=',\request()->pnr)->first();

            $order_id=$order_id->id;
        }

        return view('confirm_ticket.index',compact(['check', 'order_id']));
    }
}
