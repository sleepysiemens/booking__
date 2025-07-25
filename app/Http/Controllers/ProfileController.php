<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Passenger;
use DateTime;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        return view('profile.index');
    }

    public function orders(): View
    {
        $orders = Order::query()->where('user_id', '=', auth()->user()->id)
            ->orderBy('created_at', 'desc')->get();

        foreach (Order::query()->where('is_confirmed','=',false)->get() as $order)
        {
            if ($order->created_at->addSeconds(1)->isPast()) {
                $order->update(['is_confirmed' => true]);
            }
        }

        return view('profile.orders', compact(['orders']));
    }

    public function passengers(): View
    {
        $passengers = Passenger::query()->where('user_id', '=', auth()->user()->id)->get();

        return view('profile.passengers', compact(['passengers']));
    }


    public function new_passenger(): View
    {
        return view('profile.new_passenger');
    }

    public function update(User $user): RedirectResponse
    {
        $data = request()->all();

        unset($data['_method']);
        unset($data['_token']);

        $user->update($data);

        return redirect()->route('profile.index');
    }

    public function add_passenger(): RedirectResponse
    {
        $request = [
            'user_id'       => auth()->user()->id,
            'type'          => request()->type,
            'surname'       => request()->surname,
            'name'          => request()->name,
            'date_of_birth' => request()->date_of_birth,
            'sex'           => request()->sex,
            'citizenship'   => request()->citizenship,
            'doc_type'      => request()->doc_type,
            'serial_number' => request()->serial_number,
            'validity'      => request()->validity,
        ];
        Passenger::query()->create($request);

        return redirect()->route('profile.passengers');
    }

    public function logout (): RedirectResponse
    {
        //logout user
        auth()->logout();

        return redirect()->route('main.index');
    }
}
