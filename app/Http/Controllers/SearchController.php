<?php

namespace App\Http\Controllers;

use App\Services\AirportService;
use App\Services\FlightSearchService;
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

        //dd($this->flightSearchService->parseFlightInfo());

        $airportService = new AirportService();
        $airports = $airportService->getAllAirports();

        return view('search.index', compact([ 'airports', 'request']));
    }


}
