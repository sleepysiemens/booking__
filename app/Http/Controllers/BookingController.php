<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $request=\request()->all();
        unset($request['_token']);
        return view('booking.index', compact(['request']));
    }
}
