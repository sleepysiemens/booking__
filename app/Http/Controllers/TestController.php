<?php

namespace App\Http\Controllers;

use App\Services\TravelPayoutsService;
use GuzzleHttp\Client;


class TestController extends Controller
{
    public function index()
    {
        $client = new Client();

        $apiKey = '048a44328dd6efc65b762b8e8c20e30a';
        $date = '2024-04-02'; // Укажите нужную дату
        $originCity = 'BKK'; // Код города отправления
        $destinationCity = 'OVB'; // Код города назначения
        $currency = 'rub'; // Укажите требуемую валюту
        $adults = 2; // Количество взрослых пассажиров
        $children = 0; // Количество детей
        $infants = 0; // Количество младенцев

        dump($date.'/'.$originCity.'/'.$destinationCity.'/'.$currency.'/'.$adults.'/'.$children.'/'.$infants);

        $method='/v3/get_special_offers';

        $response = $client->get("http://api.travelpayouts.com/{$method}?currency={$currency}&origin={$originCity}&destination={$destinationCity}&depart_date={$date}&adults={$adults}&children={$children}&infants={$infants}&token={$apiKey}");
        //$response = $client->get("http://api.travelpayouts.com/{$method}");

        $tickets = json_decode($response->getBody()->getContents(), true);
        dd($tickets);
    }
}
