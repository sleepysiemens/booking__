<?php

namespace App\Http\Controllers;

use App\Jobs\UpdateOrderStatus;
use App\Models\Order;
use App\Models\Passenger;
use DateTime;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function orders()
    {
        $order=Order::query()->latest()->first();
        UpdateOrderStatus::dispatch($order)->delay(now()->addSeconds(2));
        $orders=Order::query()->where('user_id', '=', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('profile.orders', compact(['orders']));
    }

    public function passengers()
    {
        $passengers=Passenger::query()->where('user_id', '=', auth()->user()->id)->get();
        return view('profile.passengers', compact(['passengers']));
    }


    public function new_passenger()
    {
        return view('profile.new_passenger');
    }

    public function update(User $user)
    {
        $data=\request()->all();

        unset($data['_method']);
        unset($data['_token']);

        $user->update($data);
        return redirect()->route('profile.index');
    }

    public function add_passenger()
    {
        $request=\request()->all();
        unset($request['_token']);
        unset($request['_method']);
        unset($request['1']);
        $request['user_id']=auth()->user()->id;
        Passenger::create($request);
        return redirect()->route('profile.passengers');
    }

    public function logout ()
    {
        //logout user
        auth()->logout();
        // redirect to homepage
        return redirect()->route('main.index');
    }
}
