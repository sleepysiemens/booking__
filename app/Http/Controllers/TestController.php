<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use thewulf7\travelPayouts\Travel;


class TestController extends Controller
{
    public function index()
    {
       $travel = new Travel('048a44328dd6efc65b762b8e8c20e30a');

        $flightService = $travel->getFlightService();
        $flightService
            ->setIp($_SERVER['REMOTE_ADDR'])
            ->setHost('77-222-38-12.swtest.ru')
            ->setMarker('36076')
            ->addPassenger('adults', 2)
            ->addSegment('LED', 'MOW', '2024-02-02');
        dump($flightService);
        $searchData    = $flightService->search('ru', 'Y');
        $searchResults = $flightService->getSearchResults($searchData['search_id']);
    }
}
