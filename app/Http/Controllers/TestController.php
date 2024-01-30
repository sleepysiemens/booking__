<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class TestController extends Controller
{
    public function parseFlightInfo()
    {
        return view('test');
        $url = 'https://search.jetradar.com/flights?=&adults=1&children=1&ct_guests=2+%D0%BF%D0%B0%D1%81%D1%81%D0%B0%D0%B6%D0%B8%D1%80%D0%B0&ct_rooms=1&depart_date=2024-02-06&destination_iata=MOW&destination_name=%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0&infants=0&locale=ru&marker=36076.Zz1897ebd7d5d844e49749c78-126017&one_way=false&origin_iata=OVB&origin_name=%D0%9D%D0%BE%D0%B2%D0%BE%D1%81%D0%B8%D0%B1%D0%B8%D1%80%D1%81%D0%BA&return_date=2024-02-13&trip_class=0&with_request=true';

        // Используем Guzzle для выполнения запроса
        $client = new Client();
        $response = $client->request('GET', $url);
        $html = $response->getBody()->getContents();

        // Используем Symfony DomCrawler для парсинга HTML
        $crawler = new Crawler($html);

        dd($crawler);
    }
}
