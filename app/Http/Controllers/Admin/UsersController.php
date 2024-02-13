<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\AirportService;


class UsersController extends Controller
{
    public function index()
    {
        $users=User::query()->where('is_admin','!=',1)->get();
        return view('admin.users.index', compact(['users']));
    }

    /*
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
    */
}
