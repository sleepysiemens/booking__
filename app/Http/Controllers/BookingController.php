<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $request=\request()->all();
        unset($request['_token']);
        $request['total_rub']=($request['children_amount']+$request['adults_amount']+$request['infants_amount'])*699;
        $request['total_eur']=($request['children_amount']+$request['adults_amount']+$request['infants_amount'])*14;
        return view('booking.index', compact(['request']));
    }
}
