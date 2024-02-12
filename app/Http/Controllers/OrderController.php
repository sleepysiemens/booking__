<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Order $order)
    {
        $order_id=$order->id;
        return view('order.index', compact(['order_id']));
    }
}
