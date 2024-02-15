<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use App\Services\AirportService;
use App\Services\OrderDataService;
use App\Services\UserDataService;
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
        $passengersService = new UserDataService();

        $airports = $airportService->getAllAirports();
        $airports=collect($airports);

        $cookie=$dataService->set_data($request, $result);

        if($cookie!=null)
        {
            setcookie('order',$cookie);
            $cookie=json_decode($cookie);


            $adults=$passengersService->define_passengers_array($cookie->passengers->adults, 'взрослый');
            $children=$passengersService->define_passengers_array($cookie->passengers->children, 'ребенок');
            $infants=$passengersService->define_passengers_array($cookie->passengers->infants, 'младенец');

            //dd($adults);

            return view('booking.index', compact(['cookie', 'airports', 'adults', 'children', 'infants']));
        }
        else
        return redirect()->route('main.index');
    }

    public function get()
    {
        if(isset($_COOKIE['order']))
        {
            $dataService = new OrderDataService();
            $airportService = new AirportService();
            $passengersService = new UserDataService();


            $cookie=$dataService->get_data();

            $adults=$passengersService->define_passengers_array($cookie->passengers->adults, 'взрослый');
            $children=$passengersService->define_passengers_array($cookie->passengers->children, 'ребенок');
            $infants=$passengersService->define_passengers_array($cookie->passengers->infants, 'младенец');

            $airports = $airportService->getAllAirports();
            $airports=collect($airports);

            return view('booking.index', compact(['cookie', 'airports', 'adults', 'children', 'infants']));
        }
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

    /*public function pay_page_get()
    {
        if(isset($_COOKIE['order']))
        {
            $dataService = new OrderDataService();
            $cookie=$dataService->get_data();

            return view('booking.pay', compact(['cookie']));
        }
        return redirect()->route('main.index');

    }*/
}
