<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;


class OrderController extends Controller
{
    public function index($order): View
    {
        $order = Order::query()->where('number','=',$order)->first();
        $users = json_decode($order->data)->user_data->user;

        if (Cache::has('ticket_view')) {
            $ticket_view = Cache::get('ticket_view');
        } else {
            $ticket_view = 'all';
        }

        return view('order.index', compact(['order', 'users', 'ticket_view']));
    }
}
