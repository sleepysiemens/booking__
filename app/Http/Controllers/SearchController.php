<?php

namespace App\Http\Controllers;

use App\Services\FlightSearchService;
use App\Services\TravelpayoutsService;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    public function __construct(FlightSearchService $flightSearchService, TravelpayoutsService $travelpayoutsService)
    {
        $this->flightSearchService = $flightSearchService;
        $this->travelpayoutsService = $travelpayoutsService;

    }

    public function search()
    {
        $origin = request('origin');
        $destination = request('destination');
        //$departureDate = date('Y-m-d');
        $departureDate = request('departDate');
        $returnDate = request('returnDate');

        // Используйте сервис для выполнения запроса
        $result = $this->flightSearchService->searchFlights($origin, $destination, $departureDate);
        //$result = $this->travelpayoutsService->searchRoutes($origin, $destination, $departureDate);

        // Обработка и возвращение данных по вашему усмотрению.
        $results=$result['data'][$destination];

        //dd($results);

        return view('search.index', compact(['results', 'origin', 'destination']));
    }
}
