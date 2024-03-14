<?php

namespace App\Http\Controllers;

use App\Mail\OrderNotifications;
use App\Services\TravelPayoutsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public $TravelPayoutsService;
    public function __construct(TravelPayoutsService $TravelPayoutsService)
    {
        $this->TravelPayoutsService=$TravelPayoutsService;
    }
    public function index()
    {
        $request_data=
            [
              'marker'=>'36076',
              'host'=>'https://tripavia.com/',
              'user_ip'=>$_SERVER['REMOTE_ADDR'],
              'locale'=>'ru',
              'trip_class'=>'Y',
              'passengers'=>
                [
                    'adults'=>1,
                    'children'=>0,
                    'infants'=>0,
                ],
                'segment'=>
                [
                    'origin'=>'MOW',
                    'destination'=>'OVB',
                    'date'=>'2024-04-02',
                ],
            ];
        $tickets=$this->TravelPayoutsService->getAvailableTickets($request_data);
    }
}
