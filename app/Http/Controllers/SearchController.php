<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use thewulf7\travelPayouts\entity\Ticket;
use thewulf7\travelPayouts\entity\City;
use thewulf7\travelPayouts\Travel;


class SearchController extends Controller
{
    /*
    public function search()
    {
        $travel = new Travel('048a44328dd6efc65b762b8e8c20e30a');
        $ticketService = $travel->getTicketsService();


        $flights = $ticketService->getWeekMatrix(request()->origin, request()->destination, request()->departDate, request()->returnDate, 'rub');
        //$flights = $ticketService->getLatestPrices(request()->origin, request()->destination, 'true', 'rub', 'year', 1, 30);

        $result= $flights;

        dd($result);

        return view('search.index', compact(['flights']));
    }
*/
    //


//class TRAVELPAYOUTS_CFG
//{
    /* < Ссылка на API flight_search > */
    //public $api_search_id = "http://api.travelpayouts.com/v1/flight_search";

    /* < Ссылка на API flight_search_results > */
    //public $api_search_res = "http://api.travelpayouts.com/v1/flight_search_results";

    /* < Токен из личного кабинета travelpayouts > */
    //public $token = "37a27d5db50c6199a688c51139146776";
    //public $token = "e733dadeb55ebdfed29dadce51a55956";

    /* < Маркер из личного кабинета travelpayouts > */
    //public $marker = "211648";
    //public $marker = "330615";

    /* < Домен проекта. Нужен для работы с travelpayouts API > */
    //public $domain = "search.kupitrip.online";
//}

    public function random_string($length, $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ1234567890')
    {
        $numChars = strlen($chars);
        $string = '';
        for($i = 0; $i < $length; $i++) $string .= substr($chars, rand(1, $numChars) - 1, 1);
        return $string;
    }

    public function signatureQuery($options)
    {
        $result = [];

        foreach ($options as $key => $value)
        {
            if (!is_array($value)) $result[$key] = $value;
            else                   $result[$key] = implode(':', $this->signatureQuery($value));
        }

        ksort($result);
        return $result;
    }

    public function getSignature($token, $query)
    {
        $merge = array_merge([$token], $this->signatureQuery($query));
        return md5(implode(':', $merge));
    }

    public function get_search_link()
    {
        $query = [
            'marker'     => '36076',
            'host'       => '77-222-38-12.swtest.ru',
            'user_ip'    => '212.164.38.195',
            'locale'     => 'ru',
            'trip_class' => 0,
            'passengers' => [
                'adults'   => 1,
                'children' => 0,
                'infants'  => 0
            ],
            'segments' => [
                [
                    'origin'      => 'LED',
                    'destination' => 'MOW',
                    'date'        => '2024-02-02'
                ]
            ]
        ];

        $query['signature'] = $this->getSignature('', $query);

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

        $TIME   = time();

        setcookie('data', json_encode($cookies), $TIME + 900, '/');

        return send('success', [ 'cookies' => $cookies ]);
    }
    public function get_flights($search_id)
    {
        /*< --------------------- >*/
        $info = file_get_contents("http://api.travelpayouts.com/v1/flight_search_results?uuid={$search_id}");
        if ($info === false) $info = '[]';

        //setcookie('data', '', $TIME - 1, '/');

        //dd($info);

        return send('success', [ 'info' => $info ]);
    }

}
