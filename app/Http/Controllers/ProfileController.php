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
        $orders=Order::query()->where('user_id', '=', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        foreach (Order::query()->where('is_confirmed','=',false)->get() as $order)
        {
            if($order->created_at->addSeconds(1)->isPast())
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
        $request=
            [
                'user_id'=>auth()->user()->id,
                'type'=>request()->type,
                'surname'=>request()->surname,
                'name'=>request()->name,
                'date_of_birth'=>request()->date_of_birth,
                'sex'=>request()->sex,
                'citizenship'=>request()->citizenship,
                'doc_type'=>request()->doc_type,
                'serial_number'=>request()->serial_number,
                'validity'=>request()->validity,
            ];
        //dd($request);
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
