<?php

namespace App\Http\Controllers;

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
        $orders=Order::query()->where('user_id', '=', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        foreach ($orders as $order)
        {
            $datetime1=new DateTime("now");
            $datetime2=new DateTime($order->created_at);
            $interval = $datetime1->diff($datetime2);
            //dd($interval);
            if($order->is_confirmed==false and $interval->i>=1 and $interval->h<1 and $interval->d<1)
            {
                $order->update(['is_confirmed'=>true]);
            }
        }
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
