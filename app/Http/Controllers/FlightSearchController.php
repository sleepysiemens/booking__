<?php
// app/Http/Controllers/FlightSearchController.php

namespace App\Http\Controllers;

use App\Services\FlightSearchService;
use Illuminate\Support\Facades\Http;
use App\Services\TravelpayoutsService;
use GuzzleHttp\Client;
use thewulf7\travelPayouts\Travel;



class FlightSearchController extends Controller
{
    protected $flightSearchService;
    protected $travelpayoutsService;



    public function __construct(FlightSearchService $flightSearchService, TravelpayoutsService $travelpayoutsService)
    {
        $this->flightSearchService = $flightSearchService;
        $this->travelpayoutsService = $travelpayoutsService;

    }

    public function searchFlights()
    {
        $origin = 'NYC';
        $destination = 'LON';
        //$departureDate = date('Y-m-d');
        $departureDate = '2024-02-03';
        $returnDate = '2024-02-06';



        // Используйте сервис для выполнения запроса
        $result = $this->flightSearchService->searchFlights($origin, $destination, $departureDate);

        // Обработка и возвращение данных по вашему усмотрению.
        $results=$result['data'][$destination];
        dd($results);
        //return view('search.index', compact(['results', 'origin', 'destination']));
    }

    public function searchRoutes()
    {
        $origin = 'NYC';
        $destination = 'LON';
        //$departureDate = date('Y-m-d');
        $departureDate = '2024-02-03';

        $result = $this->travelpayoutsService->searchRoutes($origin, $destination, $departureDate);
        dd($result);
        //return view('search.index');
    }

    /*
    public function flightSearch()
    {
        $url = 'http://api.travelpayouts.com/v1/flight_search';

        $data = [
            'marker' => '36076',
            'host' => 'search.tripavia.com',
            'user_ip' => $_SERVER['REMOTE_ADDR'],
            'locale' => 'ru',
            'trip_class' => 'Y',
            'passengers' => [
                'adults' => 1,
                'children' => 0,
                'infants' => 0,
            ],
            'segments' => [
                [
                    'origin' => 'NYC',
                    'destination' => 'LAX',
                    'date' => '2024-02-02',
                ],
                [
                    'origin' => 'LAX',
                    'destination' => 'NYC',
                    'date' => '2024-02-03',
                ],
            ],
        ];

        $travel = new Travel('048a44328dd6efc65b762b8e8c20e30a');
        $flightService = $travel->getFlightService();
        $signature = $flightService->getSignature($data);
        //dd($signature);

        $data['signature']=$signature;

        try {
            $response = Http::post($url, $data);

            // Выведите весь ответ для отладки
            dump($response->body());

            // Получите тело ответа
            $body = $response->body();

            // Преобразуйте JSON-ответ в массив (если необходимо)
            $responseData = json_decode($body, true);

            // Верните данные в виде ответа
            return response()->json($responseData);
        } catch (\Exception $e) {
            // Выведите информацию об ошибке для отладки
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
*/

    public function flightSearch()
    {
        $url = 'http://api.travelpayouts.com/v1/flight_search';
        $apiKey = '048a44328dd6efc65b762b8e8c20e30a';

        $data = [
            'marker' => '36076',
            'host' => 'search.tripavia.com',
            'user_ip' => $_SERVER['REMOTE_ADDR'],
            'locale' => 'ru',
            'trip_class' => 'Y',
            'passengers' => [
                'adults' => 1,
                'children' => 0,
                'infants' => 0,
            ],
            'segments' => [
                [
                    'origin' => 'NYC',
                    'destination' => 'LAX',
                    'date' => '2024-02-02',
                ],
                [
                    'origin' => 'LAX',
                    'destination' => 'NYC',
                    'date' => '2024-02-03',
                ],
            ],
        ];

        $travel = new Travel('048a44328dd6efc65b762b8e8c20e30a');
        $flightService = $travel->getFlightService();
        $signature = $flightService->getSignature($data);
        $data['signature']=$signature;
        //dd($signature);

        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $apiKey,
        ];

        $client = new Client();

        try {
            $response = $client->post($url, [
                'json' => $data,
                'headers' => $headers,
            ]);

            $body = $response->getBody()->getContents();
            $responseData = json_decode($body, true);

            return response()->json($responseData);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 403);
        }
    }
}
