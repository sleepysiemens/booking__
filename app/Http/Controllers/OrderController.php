<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index($order)
    {
        $order=Order::query()->where('number','=',$order)->first();
        return view('order.index', compact(['order']));
    }
}
