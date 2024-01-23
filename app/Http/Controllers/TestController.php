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
        $result=$this->OldSeachService->get_search_link();

        //$client = new Client();
        //$response = $client->get("https://api.travelpayouts.com/v1/prices/cheap?origin={$origin}&destination={$destination}&depart_date={$departureDate}&token={$this->apiKey}");

        dd($result);
    }

}
