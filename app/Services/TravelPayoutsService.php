<?php

namespace App\Services;

use GuzzleHttp\Client;

class TravelPayoutsService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = '048a44328dd6efc65b762b8e8c20e30a';
    }

    public function getAvailableTickets($requestData)
    {
        // Создайте экземпляр клиента Guzzle HTTP
        $client = new Client();

        // Добавьте токен к запросу
        $requestData['token'] = $this->apiKey;

        // Подпишите запрос
        $requestData['signature'] = $this->generateSignature($requestData);

        // Отправьте POST-запрос к API Travelpayouts
        $requestData=json_encode($requestData);
        $response = $client->post('https://api.travelpayouts.com/v1/flight_search', [
            'json'    => $requestData,
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ]);

        // Получите данные о билетах
        $data = json_decode($response->getBody(), true);

        // Обработайте полученные данные и верните список доступных билетов
        $tickets = $data['data'];

        return $tickets;
    }

    private function generateSignature($requestData)
    {
        // Отсортируйте параметры запроса по имени параметра
        ksort($requestData);

        // Соберите строку для подписи
        $signatureString = '';

        foreach ($requestData as $key => $value) {
            $signatureString .= $key . ':' . json_encode($value) . ':';
        }

        // Удалите последний символ-двоеточие
        $signatureString = rtrim($signatureString, ':');

        // Вычислите MD5 подпись
        return md5($signatureString);
    }
}
