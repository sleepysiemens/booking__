<?php

namespace App\Http\Controllers;

use App\Services\AirportService;
use App\Services\FlightSearchService;
use Illuminate\Support\Facades\Http;

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

        $airportService = new AirportService();
        $airports = $airportService->getAllAirports();


        $results = $this->flightSearchService->parseFlightInfo($request['origin_'], $request['destination_'], $request['departDate']);

        $airlines_filter=$this->flightSearchService->FilterAirlines($results);

        // Обработка и возвращение данных по вашему усмотрению.

        //dd($request['departDate']);

        return view('search.index', compact(['results', 'airports', 'request', 'airlines_filter']));
    }
}
