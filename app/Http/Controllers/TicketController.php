<?php

namespace App\Http\Controllers;

use App\Models\Airports;
use App\Services\AirportService;
use Illuminate\Http\Request;
use App\Models\Order;

class TicketController extends Controller
{
    public function index()
    {
        $airportService = new AirportService();
        $airports = Airports::all();

        $order=Order::query()->where('user_id', '=', auth()->user()->id)->latest()->first();
        $data=json_decode($order->data);
        //dd($airports);
        $request=$data->request;
        $result=$data->result;
        $user_info=$data->user_info;

        return view('ticket.index', compact(['request', 'result', 'order', 'user_info', 'airports']));
    }
}
