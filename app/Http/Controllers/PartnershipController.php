<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PartnershipApplication;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class PartnershipController extends Controller
{
    public function index()
    {
        if(auth()->user()->is_partner)
        {
            $partnership=PartnershipApplication::query()->where('user_id','=', auth()->user()->id)->first();
            $users=User::query()->where('ref_id','=',auth()->user()->id)->get();
            $orders=0;
            foreach ($users as $user)
            {
                $orders=$orders+Order::query()->where('user_id','=',$user->id)->count();
            }
            $users=count($users);
            return view('profile.partnership.index', compact(['partnership', 'users', 'orders']));
        }
        else
            return view('profile.partnership.promo');
    }

    public function become_partner()
    {
        if(!PartnershipApplication::query()->where('user_id','=', auth()->user()->id)->exists())
            return view('profile.partnership.become');
        else
            return view('profile.partnership.become_wait');
    }

    public function form()
    {
        $request=\request()->all();
        $request['user_id']=auth()->user()->id;
        unset($request['_token']);
        PartnershipApplication::create($request);
        return redirect()->route('partnership.index');
    }

    public function withdraw()
    {
        $partnership=PartnershipApplication::query()->where('user_id','=', auth()->user()->id)->first();
        $withdraws=Withdraw::query()->where('user_id','=', auth()->user()->id)->get();

        return view('profile.partnership.withdraw', compact(['partnership', 'withdraws']));
    }

    public function withdraw_send()
    {
        $request=\request()->all();
        unset($request['_token']);
        $request['user_id']=auth()->user()->id;
        Withdraw::create($request);

        $partnership=PartnershipApplication::query()->where('user_id','=', auth()->user()->id)->first();
        $partnership->update(['balance'=>$partnership->balance-$request['amount']]);

        return redirect()->route('partnership.index');
    }
}
