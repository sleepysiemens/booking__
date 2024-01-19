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
        /*$flightService
            ->setIp($_SERVER['REMOTE_ADDR'])
            ->setHost('aviasales.ru')
            ->setMarker('36076')
            ->addPassenger('adults', 1)
            ->addSegment('LED', 'MOW', '2024-02-02');*/

        //$searchData    = $flightService->search('ru', 'Y');
        $url = 'flight_search';

        $options = [
            'json' => [
                'marker'     => '36076',
                'host'       => 'search.tripavia.com',
                'user_ip'    => $_SERVER['REMOTE_ADDR'],
                'locale'     => 'ru',
                'trip_class' => 'Y',
                'passengers' => ['adults'=>1],
                'segments'   => [['origin'=>'LED', 'destination'=>'MOW', 'date'=>'2024-03-02'], ['origin'=>'MOW', 'destination'=>'LED', 'date'=>'2024-05-02']],
            ],
        ];

        $options['json']['signature'] = $flightService->getSignature($options['json']);

        dd($options);

        $searchData = $flightService->getClient()->setApiVersion('v1')->execute($url, $options, 'POST', false);

        $searchResults = $flightService->getSearchResults($searchData['search_id']);

        dd($searchResults);

        //return view('search.index', compact(['flights']));

    }
}
