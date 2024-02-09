<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\AirportService;


class OrdersController extends Controller
{
    public function index()
    {
        $orders=Order::all();
        return view('admin.orders.index', compact(['orders']));
    }
}
