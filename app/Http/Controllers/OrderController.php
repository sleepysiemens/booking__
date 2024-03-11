<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class OrderController extends Controller
{
    public function index($order)
    {
        $order=Order::query()->where('number','=',$order)->first();
        $users=json_decode($order->data)->user_data->user;
        if(Cache::has('ticket_view'))
            $ticket_view=Cache::get('ticket_view');
        else
            $ticket_view='all';

        return view('order.index', compact(['order', 'users', 'ticket_view']));
    }
}
