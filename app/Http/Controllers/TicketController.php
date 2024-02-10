<?php

namespace App\Http\Controllers;

use App\Models\Airports;
use App\Services\AirportService;
use Illuminate\Http\Request;
use App\Models\Order;

class TicketController extends Controller
{
    public function index(Order $order)
    {
        $airportService = new AirportService();
        $airports = Airports::all();

        $cookie=json_decode($order->data);
        //dd($cookie);


        return view('ticket.index', compact(['cookie', 'airports', 'order']));
    }
}
