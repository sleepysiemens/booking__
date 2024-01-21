<?php
// app/Services/FlightSearchService.php

namespace App\Services;

use GuzzleHttp\Client;

class FlightSearchService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = '048a44328dd6efc65b762b8e8c20e30a';
    }

    public function searchFlights($origin, $destination, $departureDate)
    {
        $client = new Client();
        $response = $client->get("https://api.travelpayouts.com/v1/prices/cheap?origin={$origin}&destination={$destination}&depart_date={$departureDate}&token={$this->apiKey}");
        /*$response = $client->get("https://api.travelpayouts.com/v2/prices/direct", [
            'query' => [
                'origin' => $origin,
                'destination' => $destination,
                'token' => '048a44328dd6efc65b762b8e8c20e30a',
            ],
        ]);*/
        return json_decode($response->getBody(), true);
    }
}
