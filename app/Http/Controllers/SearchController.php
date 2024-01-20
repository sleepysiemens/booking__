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
        $origin = 'NYC';
        $destination = 'LON';
        //$departureDate = date('Y-m-d');
        $departureDate = '2024-02-03';
        $returnDate = '2024-02-06';

        // Используйте сервис для выполнения запроса
        $result = $this->flightSearchService->searchFlights($origin, $destination, $departureDate);

        // Обработка и возвращение данных по вашему усмотрению.
        $results=$result['data'][$destination];

        //dd($results);

        return view('search.index', compact(['results', 'origin', 'destination']));
    }
}
