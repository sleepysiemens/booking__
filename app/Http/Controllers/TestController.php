<?php

namespace App\Http\Controllers;

use App\Mail\OrderNotifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function index()
    {
        Mail::to('2001sema@gmail.com')->send(new OrderNotifications(1));
        dd(1);
    }
}
