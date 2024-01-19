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

        $searchData = $flightService->getClient()->setApiVersion('v1')->execute($url, $options, 'POST', true);

        $searchResults = $flightService->getSearchResults($searchData['search_id']);

        dd($searchResults);

        //return view('search.index', compact(['flights']));

    }

    function random_string($length, $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ1234567890')
    {
        $numChars = strlen($chars);
        $string = '';
        for($i = 0; $i < $length; $i++) $string .= substr($chars, rand(1, $numChars) - 1, 1);
        return $string;
    }

    public function old_search()
    {
        $travel = new Travel('048a44328dd6efc65b762b8e8c20e30a');
        $flightService = $travel->getFlightService();

        $timezone  = 'America/Los_Angeles';
        $departure = 'LED';
        $arrival   = 'MOW';
        $start     = '02-02-2024';
        $end       = '02-03-2024';
        $adults    = 1;
        $children  = 0;
        $infants   = 0;
        $tripClass = 'Y';

        date_default_timezone_set($timezone);

        $query = [
            'marker'     => '36076',
            'host'       => 'search.tripavia.com',
            'user_ip'    => $_SERVER['REMOTE_ADDR'],
            'locale'     => 'ru',
            'trip_class' => $tripClass,
            'passengers' => [
                'adults'   => $adults,
                'children' => $children,
                'infants'  => $infants
            ],
            'segments' => [
                [
                    'origin'      => $departure[1],
                    'destination' => $arrival[1],
                    'date'        => '02-02-2024'
                ]
            ]
        ];

        $query['signature'] = $flightService->getSignature($query);

        $result = json_decode(file_get_contents('http://api.travelpayouts.com/v1/flight_search', false, stream_context_create([
            'http' => [
                'method'  => 'POST',
                'header'  => 'Content-type: Content-type:application/json',
                'content' => json_encode($query, JSON_UNESCAPED_UNICODE)
            ]
        ])));

        $cookies = array(
            'uniq_code' => $this->random_string(16),
            'search_id' => $result->search_id
        );

        dd($cookies);

    }
}
