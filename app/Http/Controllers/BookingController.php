<?php

namespace App\Http\Controllers;

use App\Services\AirportService;
use App\Services\OrderDataService;
use Illuminate\Http\Request;
use App\Models\Order;

class BookingController extends Controller
{
    public function index()
    {
        $request_all=\request()->all();
        $request=json_decode($request_all['request']);
        $result=json_decode($request_all['result']);

        $airportService = new AirportService();
        $dataService = new OrderDataService();

        $airports = $airportService->getAllAirports();
        $airports=collect($airports);

        $cookie=$dataService->set_data($request, $result);

        if($cookie!=null)
        {
            setcookie('order',$cookie);
            $cookie=json_decode($cookie);

            return view('booking.index', compact(['cookie', 'airports']));
        }
        else
        return redirect()->route('main.index');
    }

    public function pay_page_post()
    {
        $dataService = new OrderDataService();

        if($_COOKIE['order']!=null)
        {
            $cookie=$dataService->update_data(\request()->all());
            setcookie('order',json_encode($cookie));
            return view('booking.pay', compact(['cookie']));
        }
        else
            return redirect()->route('main.index');
    }

    public function pay_page_get()
    {
        if(isset($_COOKIE['order']))
        {
            $dataService = new OrderDataService();
            $cookie=$dataService->get_data();

            return view('booking.pay', compact(['cookie']));
        }
        return redirect()->route('main.index');

    }
}
