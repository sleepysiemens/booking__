<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        $orders=Order::query()->where('user_id', '=', auth()->user()->id)->get();
        //dd($orders);
        return view('profile.index', compact(['orders']));
    }

    public function update(User $user)
    {
        $data=\request()->all();
        unset($data['_method']);
        unset($data['_token']);

        $user->update($data);
        return redirect()->route('profile.index');
    }

    public function logout () {
        //logout user
        auth()->logout();
        // redirect to homepage
        return redirect()->route('main.index');
    }
}
