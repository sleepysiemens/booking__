<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WaitController extends Controller
{
    public function index()
    {
        if(!isset($_COOKIE['order']))
            return redirect()->route('main.index');
        else
        {
            unset($_COOKIE['order']);
            return view('wait.index');
        }
    }
}
