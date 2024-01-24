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
        //if($request[''])

        $airportService = new AirportService();
        $airports = $airportService->getAllAirports();

        $origin = request('origin_');
        $destination = request('destination_');
        $departureDate = request('departDate');
        $returnDate = request('returnDate');

        // Используйте сервис для выполнения запроса
        $results = $this->flightSearchService->searchFlights($origin, $destination, $departureDate);

        // Обработка и возвращение данных по вашему усмотрению.

        //dd($results);

        return view('search.index', compact(['results', 'origin', 'destination', 'airports', 'request']));
    }
}
