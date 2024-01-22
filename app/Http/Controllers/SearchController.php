<?php

namespace App\Http\Controllers;

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
        dd(request()->all());
        $origin = request('origin');
        $destination = request('destination');
        //$departureDate = date('Y-m-d');
        $departureDate = request('departDate');
        $returnDate = request('returnDate');

        // Используйте сервис для выполнения запроса
        $result = $this->flightSearchService->searchFlights($origin, $destination, $departureDate);

        // Обработка и возвращение данных по вашему усмотрению.
        $results=$result['data'][$destination];

        //dd($results);

        return view('search.index', compact(['results', 'origin', 'destination']));
    }
}
