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

        $response = json_decode($response->getBody(), true);
        $response=$response['data'];

        foreach ($response as $item)
        {
            foreach ($item as $value)
            {
                $result[]=$value;
            }
        }

        return $result;
    }
}
