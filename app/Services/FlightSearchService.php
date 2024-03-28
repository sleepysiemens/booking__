<?php
// app/Services/FlightSearchService.php

namespace App\Services;

use App\Models\Airports;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Symfony\Component\Panther\Client;
use App\Models\Airlines;

class FlightSearchService
{
    public function FilterAirlines($tickets)
    {
        $airlines=[];
        foreach ($tickets as $ticket)
        {
            $airlines[]=
                [
                    //'airline'=>$ticket['airline'],
                    'airline'=>$ticket['airline_short'],
                    'airline_short'=>$ticket['airline_short'],
                ];
        }

        $associativeArray = array_column($airlines, null, 'airline');

        $result=array_values($associativeArray);

        return $result;
    }

    public function FilterTransfers($tickets)
    {
        $transfers=[];
        foreach ($tickets as $ticket)
        {
            $transfers[]=
                [
                    'transfers_amount'=>$ticket['transfers_amount'],
                ];
        }
        $associativeArray = array_column($transfers, null, 'transfers_amount');

        $result=array_values($associativeArray);
        return $result;

    }

    public function getAllAirlines()
    {
        if(Airlines::first()==null)
        {
            $this->generateAllAirlines();
        }
    }

    public function generateAllAirlines()
    {
        $response = Http::get('https://api.travelpayouts.com/data/en/airlines.json', ['x-access-token:' => '048a44328dd6efc65b762b8e8c20e30a']);
        $body = $response->body();

        $airlineData = json_decode($body, true);

        foreach ($airlineData as $airline)
        {
            $data=['code'=>$airline['code'], 'name'=>$airline['name']];
            Airlines::create($data);
        }
    }

    public function parseFlightInfo($origin, $destination, $depart_date, $return_date, $adults, $children, $infants)
    {
        $response = Http::asForm()->post('https://test.api.amadeus.com/v1/security/oauth2/token', [
            'grant_type' => 'client_credentials',
            'client_id' => 'AIc7WGpeIqlRn46uS4jub25F2CjQEn3F',
            'client_secret' => 'm1HYsJade6hkAWoJ',
        ]);

        // Задаем URL и параметры запроса
        $url = 'https://test.api.amadeus.com/v2/shopping/flight-offers';
        $params = [
            'originLocationCode' => $origin,
            'destinationLocationCode' => $destination,
            'departureDate' => $depart_date ,
            'adults' => $adults,
            'children' => $children,
            'infants' => $infants,
            'nonStop' => 'false',
            'currencyCode' => 'RUB',
            'max' => 10
        ];

        if($return_date!='не установлено')
        {
            $params['returnDate']=$return_date;
        }


        // Формируем заголовки
        $headers = [
            #'accept: application/vnd.amadeus+json',
            'Authorization: Bearer '.$response->json()['access_token']
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
        }

        // Закрываем cURL-сессию
        curl_close($ch);

        // Преобразуем JSON-ответ в массив
        $tickets = json_decode($response);

        //проверяем действие токена
        if(isset($tickets->errors))
        {
            return redirect()->route('main.index');

            //dd($tickets->errors);
        }

        return $this->standart_tickets($tickets->data);
    }

    public function standart_tickets($tickets)
    {
        $tickets_=[];
        $i=0;
        foreach ($tickets as $ticket)
        {
            $i++;
            $tickets_[$i]['id']=$i;
            $tickets_[$i]['airline_short']=$ticket->itineraries[0]->segments[0]->carrierCode;
            $tickets_[$i]['depart_datetime']=strtotime($ticket->itineraries[0]->segments[0]->departure->at);
            $tickets_[$i]['origin']=$ticket->itineraries[0]->segments[0]->departure->iataCode;
            $tickets_[$i]['arrival_datetime']=strtotime(Arr::last($ticket->itineraries[0]->segments)->arrival->at);
            $tickets_[$i]['destination']=Arr::last($ticket->itineraries[0]->segments)->arrival->iataCode;
            $tickets_[$i]['duration']=$ticket->itineraries[0]->duration;
            $tickets_[$i]['transfers_amount']=count($ticket->itineraries[0]->segments)-1;
            $tickets_[$i]['flight_num']='';
            $tickets_[$i]['price']=floatval($ticket->price->total);
            $j=0;

            if(count($ticket->itineraries[0]->segments)==1)
            {
                $tickets_[$i]['transfer']='прямой';
            }
            else
            {
                $tickets_[$i]['transfer']='пересадок:'.count($ticket->itineraries[0]->segments)-1;
            }

            foreach ($ticket->itineraries[0]->segments as $segment)
            {
                $j++;
                $tickets_[$i]['transfers'][$j]['depart_datetime']=strtotime($segment->departure->at);
                $tickets_[$i]['transfers'][$j]['origin']=$segment->departure->iataCode;
                $tickets_[$i]['transfers'][$j]['destination']=$segment->arrival->iataCode;
                $tickets_[$i]['transfers'][$j]['arrival_datetime']=strtotime($segment->arrival->at);
                $tickets_[$i]['transfers'][$j]['duration']=$segment->duration;
                $tickets_[$i]['transfers'][$j]['flight_num']=$segment->carrierCode.'-'.$segment->number;
                $tickets_[$i]['transfers'][$j]['airline_short']=$segment->carrierCode;

                $tickets_[$i]['flight_num']=$tickets_[$i]['flight_num'].'/'.$segment->carrierCode.'-'.$segment->number;
            }
        }

        //dd($tickets_);
        return $tickets_;
    }
}

