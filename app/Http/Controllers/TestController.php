<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Services\TravelpayoutsService;
use Illuminate\Support\Facades\Http;


class TestController extends Controller
{
    public function getAvailableTickets(Request $request)
    {
        // Replace with your actual API key
        $apiKey = '048a44328dd6efc65b762b8e8c20e30a';

        // Create an array to store query parameters
        $queryParameters = [
            'host' => 'http://tripavia.com/',
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
                    'origin' => 'MOW',
                    'destination' => 'LON',
                    'date' => '2024-02-02',
                ],
                [
                    'origin' => 'LON',
                    'destination' => 'MOW',
                    'date' => '2024-02-06',
                ],
            ],
        ];

        // Sort the query parameter names alphabetically
        ksort($queryParameters);

        // Concatenate parameter names and values with a colon
        $signatureString = '';
        foreach ($queryParameters as $key => $value) {
            $signatureString .= $key . ':' . json_encode($value) . ':';
        }

        // Add the token and marker to the signature string
        $signatureString .= 'marker:' . '36076' . ':';
        $signatureString .= 'token:' . $apiKey;

        // Calculate the MD5 signature
        $signature = md5($signatureString);

        // Update the request data with the calculated signature
        $requestData = [
            'signature' => $signature,
            'marker' => '36076',
            'host' => 'http://tripavia.com/',
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
                    'origin' => 'MOW',
                    'destination' => 'LON',
                    'date' => '2024-02-02',
                ],
                [
                    'origin' => 'LON',
                    'destination' => 'MOW',
                    'date' => '2024-02-06',
                ],
            ],
        ];

        // Create a Guzzle HTTP client and send the POST request
        $client = new Client();
        $response = $client->post('https://api.travelpayouts.com/v1/flight_search', [
            'json' => $requestData,
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $apiKey,
            ],
        ]);

        // Process the response and return the result
        $data = json_decode($response->getBody(), true);
        $tickets = $data['data'];

        dd($tickets);

        return view('tickets.index', ['tickets' => $tickets]);
    }
}
