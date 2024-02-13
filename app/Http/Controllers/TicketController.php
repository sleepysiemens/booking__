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
        if(auth()->user()->id ==$order->usser_id or auth()->user()->is_admin==1)
        {
            $airports = Airports::all();

            $cookie=json_decode($order->data);

            return view('ticket.index', compact(['cookie', 'airports', 'order']));
        }
        return redirect()->route('main.index');
    }
}
