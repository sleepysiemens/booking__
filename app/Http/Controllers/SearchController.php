<?php

namespace App\Http\Controllers;

use App\Models\Airports;
use App\Services\AirportService;
use App\Services\FlightSearchService;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\Http;
use Symfony\Component\Panther\Client;




class SearchController extends Controller
{
    public function __construct(FlightSearchService $flightSearchService)
    {
        $this->flightSearchService = $flightSearchService;
    }

    public function search()
    {
            $request=request()->all();
            if(!isset($request['passengers']))
            {
                $request['passengers']=
                    [
                        'adults'=>1,
                        'children'=>0,
                        'infants'=>0,
                    ];
                $request['trip_class']=0;
            }

            //dd($request);

            setcookie('request',json_encode($request));

            $airportService = new AirportService();
            $airports = $airportService->getAllAirports();

            //return view('search.index', compact([ 'airports', 'request']));
        return redirect()->route('search.get');
    }

    public function search_get()
    {
        if(isset($_COOKIE['request']))
        {
            $request=json_decode($_COOKIE['request'],'true');
            //dd($request);

            $airportService = new AirportService();
            $airports = $airportService->getAllAirports();

            return view('search.index', compact([ 'airports', 'request']));
        }
        return redirect()->route('main.index');
    }


}
