<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Services\OldSeachService;
use Illuminate\Support\Facades\Http;


class TestController extends Controller
{
    public function __construct(OldSeachService $oldSeachService)
    {
        $this->OldSeachService = $oldSeachService;
    }

    public function test()
    {
        //$result=$this->OldSeachService->get_search_link();

        //$client = new Client();
        //$response = $client->get("https://api.travelpayouts.com/v1/prices/cheap?origin={$origin}&destination={$destination}&depart_date={$departureDate}&token={$this->apiKey}");

        //dd($result);

        $url = 'https://api.travelpayouts.com/v1/flight_search';

        $params =
            [
                "signature"=> "b97bad81ba0f1f9f9994f0291c1e3123",
                "marker"=> "36076",
                "host"=> "tripavia.com",
                "user_ip"=> "212.164.65.246",
                "locale"=> "ru",
                "trip_class"=> "Y",

                "passengers"=>
                [
                    "adults"=> 1,
                    "children"=> 0,
                    "infants"=> 0
                ],
                "segments"=>
                [
                    [
                        "origin"=> "LED",
                        "destination"=> "MOW",
                        "date"=> "2024-02-02"
                    ]
                ]
            ];

        $headers = [
            //'Content-Type' => 'application/json',  // Уточните тип содержимого, если необходимо
            'x-access-token' => '048a44328dd6efc65b762b8e8c20e30a',  // Если требуется авторизация
        ];

        $response = Http::withHeaders($headers)->post($url, $params);

        $status = $response->status();
        $data = $response->json();

// Вывод результата
        dd($status, $data);
    }

}
