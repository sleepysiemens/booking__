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


        $flights = $ticketService->getWeekMatrix(request()->origin, 'MOW', '15-01-2024', '19-01-2024', 'rub');

        //$result= $flights[0]->getDepartDate()->format('Y-m-d H:i:s');
        $result= $flights[0];

        //dd($result);

        return view('search.index', compact(['flights']));
    }
}
