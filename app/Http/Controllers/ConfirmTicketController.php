<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\View\View;

class ConfirmTicketController extends Controller
{
    public function index(): View
    {
        return view('confirm_ticket.index');
    }

    public function check(): View
    {
        $pnr = request()->pnr;
        $check = Order::query()
            ->join('users','users.id', '=', 'orders.user_id')
            ->where('users.surname','=', request()->surname)
            ->where('orders.reservation_code', '=', request()->pnr)->exists();

        $order = [];
        $data = [];

        if ($check) {
            $order = Order::query()
                ->join('users','users.id','=', 'orders.user_id')
                ->where('users.surname','=', request()->surname)
                ->where('orders.reservation_code','=', request()->pnr)->select('orders.*')->first();

            $data = json_decode($order->data);
            $check = $order->is_confirmed;
        }

        return view('confirm_ticket.index',compact(['check', 'order', 'pnr', 'data']));
    }
}
