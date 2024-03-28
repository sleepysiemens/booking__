<?php

namespace App\Http\Controllers;

use App\Services\TravelPayoutsService;
use GuzzleHttp\Client;

class TestController extends Controller
{
    public function index()
    {
        // Задаем URL и параметры запроса
        // Задаем URL и параметры запроса
        $url = 'https://test.api.amadeus.com/v2/shopping/flight-offers';
        $params = [
            'originLocationCode' => 'SYD',
            'destinationLocationCode' => 'BKK',
            'departureDate' => '2024-05-02',
            'adults' => 1,
            'nonStop' => 'false', // Используем строку "false" вместо логического значения false
            'max' => 250
        ];


        // Формируем заголовки
        $headers = [
            #'accept: application/vnd.amadeus+json',
            'Authorization: Bearer 0plAN3MfTmjrUPdOaYVwoW1MJJfa'
        ];

        // Инициализируем cURL-сессию
        $ch = curl_init();

        // Устанавливаем опции cURL
        curl_setopt($ch, CURLOPT_URL, $url . '?' . http_build_query($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // Выполняем запрос и получаем ответ
        $response = curl_exec($ch);

        // Проверяем на наличие ошибок
        if(curl_errno($ch)){
            $error_msg = curl_error($ch);
            // Обработка ошибки...
        }

        // Закрываем cURL-сессию
        curl_close($ch);

        // Преобразуем JSON-ответ в массив
        $tickets = json_decode($response, true);

        // Выводим результат
        dd($tickets);
    }
}
