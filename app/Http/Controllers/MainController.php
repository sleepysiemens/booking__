<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('main.index');
    }

    public function search()
    {
        return view('search.index');
    }

    public function booking()
    {
        return view('booking.index');

    }
}
