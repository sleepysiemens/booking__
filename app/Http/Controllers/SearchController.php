<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use thewulf7\travelPayouts\entity\Ticket;
use thewulf7\travelPayouts\entity\City;
use thewulf7\travelPayouts\Travel;


class SearchController extends Controller
{
    public function search()
    {
        $travel = new Travel('048a44328dd6efc65b762b8e8c20e30a');
        $ticketService = $travel->getTicketsService();


        //$flights = $ticketService->getWeekMatrix(request()->origin, request()->destination, request()->departDate, request()->returnDate, 'rub');

        $flightService = $travel->getFlightService();
        $flightService
            ->setIp($_SERVER['REMOTE_ADDR'])
            ->setHost('kupitrip.online')
            ->setMarker('36076')
            ->addPassenger('adults', 2)
            ->addSegment('LED', 'MOW', '2024-02-02');
        dd($flightService);
        $searchData    = $flightService->search('ru', 'Y');
        $searchResults = $flightService->getSearchResults($searchData['search_id']);

        //$result = $flights;

        dd($searchResults);

        return view('search.index', compact(['flights']));
    }
}
