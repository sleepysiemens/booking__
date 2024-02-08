<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class TicketController extends Controller
{
    public function index()
    {
        if(!isset($_COOKIE['order']) OR !isset($_COOKIE['user_info']))
            return redirect()->route('main.index');
        else
        {
            $request=json_decode($_COOKIE['order']);
            $user_info=json_decode($_COOKIE['user_info']);
            $order=Order::query()->where('id', '=', $request->order_number)->first();
            //dd('request', $request, 'user_info', $user_info, 'order', $order);
            return view('ticket.index', compact(['request', 'user_info', 'order']));
        }
    }
}
