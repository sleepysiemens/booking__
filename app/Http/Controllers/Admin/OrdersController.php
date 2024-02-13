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
        $orders=Order::query()->join('users', 'users.id','=','orders.user_id')->select('orders.*', 'users.email')->orderBy('created_at', 'desc')->get();
        return view('admin.orders.index', compact(['orders']));
    }

    public function edit(Order $order)
    {
        return view('admin.orders.edit', compact(['order']));
    }

    public function update(Order $order)
    {
        $data=request()->all();
        unset($data['_method'], $data['_token']);
        if(!isset($data['is_payed']))
            $data['is_payed']=0;

        $order->update($data);
        return redirect(route('admin.orders.index'));
    }

    public function delete(Order $order)
    {
        $order->delete();
        return redirect(route('admin.orders.index'));
    }
}
