<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\PartnershipApplication;
use App\Models\User;
use App\Models\Withdraw;

class PartnersController extends Controller
{
    public function index()
    {
        $applications=PartnershipApplication::query()->where('is_active','=',false)->join('users','users.id','=','partnership_applications.user_id')->select('users.email','partnership_applications.*')->get();
        $partners=User::query()->join('partnership_applications','partnership_applications.user_id','=','users.id')->where('is_partner','=',true)->get();
        foreach ($partners as $partner)
        {
            $orders_count=0;
            $users_count=0;
            $users=User::query()->where('ref_id','=',$partner->id)->get();
            foreach ($users as $user)
            {
                $orders_count=$orders_count+Order::query()->where('user_id','=',$user->id)->count();
            }
            $users_count=count($users);
            $partner->users_count=$users_count;
            $partner->orders_count=$orders_count;
        }
        $withdraws=Withdraw::query()->where('done','=',false)->join('users','users.id','=','withdraws.user_id')->select('users.email','withdraws.*')->get();
        return view('admin.partners.index', compact('applications', 'partners', 'withdraws'));
    }

    public function accept_application(PartnershipApplication $application)
    {
        $user=User::query()->where('id','=',$application->user_id)->first();
        $user->update(['is_partner'=>1]);
        $ref_link=hash('sha256',$user->email);

        $application->update(['is_active'=>true, 'link'=>$ref_link]);
        return redirect()->route('admin.partners.index');
    }

    public function accept_withdraw(Withdraw $withdraw)
    {
        $withdraw->update(['done'=>true]);


        return redirect()->route('admin.partners.index');
    }
}
