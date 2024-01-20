<?php
// app/Services/TravelpayoutsService.php

namespace App\Services;

use GuzzleHttp\Client;

class TravelpayoutsService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = '048a44328dd6efc65b762b8e8c20e30a';
    }

    public function searchRoutes($origin, $destination, $date)
    {
        $client = new Client();
        $response = $client->get("http://api.travelpayouts.com/v2/prices/latest?currency=rub&limit=10&origin={$origin}&destination={$destination}&depart_date={$date}&token={$this->apiKey}");

        return json_decode($response->getBody(), true)['data'];
    }
}
