<?php

namespace App\Http\Controllers;

use App\Services\AirportService;
use App\Services\FlightSearchService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function __construct(public FlightSearchService $flightSearchService) {}

    public function search(): string
    {
            $request=request()->all();

            if (! isset($request['passengers'])) {
                $request['passengers'] = [
                    'adults'   => 1,
                    'children' => 0,
                    'infants'  => 0,
                ];

                $request['trip_class'] = 0;
            }

            setcookie('request', json_encode($request));

            $cacheKey = "{$request['origin_']}-{$request['destination_']},{$request['departDate']}_{$request['returnDate']},{$request['passengers']['adults']}_{$request['passengers']['children']}_{$request['passengers']['infants']}";

        return redirect()->route('search.get', $cacheKey);
    }

    public function search_get($cacheKey): View|RedirectResponse
    {
        if ($cacheKey != null) {
            $cacheKey = explode(',',$cacheKey);
            $cities = explode('-',$cacheKey[0]);
            $dates = explode('_',$cacheKey[1]);
            $passengers = explode('_',$cacheKey[2]);

            $airportService = new AirportService();
            $airports = collect($airportService->getAllAirports());
            $request = [
                    'origin_'           => $cities[0],
                    'origin'            => $airports->where('airport_code','=',$cities[0])->first()['city_name'],
                    'destination_'      => $cities[1],
                    'destination'       => $airports->where('airport_code','=',$cities[1])->first()['city_name'],
                    'departDate'        => $dates[0],
                    'returnDate'        => $dates[1],
                    'passengers_amount' => $passengers[0] + $passengers[1] + $passengers[2],
                    'passengers'        => ['adults'=>$passengers[0], 'children'=>$passengers[1], 'infants'=>$passengers[2]]
            ];

            return view('search.index', compact([ 'airports', 'request']));
        }

        return redirect()->route('main.index');
    }


}
