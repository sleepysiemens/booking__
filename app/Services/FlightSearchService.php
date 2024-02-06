<?php
// app/Services/FlightSearchService.php

namespace App\Services;

use Symfony\Component\Panther\Client;


class FlightSearchService
{
    public function oldparseFlightInfo($origin, $destination, $depart_date)
    {
        // Создаем клиента Panther
        /*$client = Client::createChromeClient('/var/www/html/drivers/chromedriver', null, [
            'chromedriver_arguments' => ['--headless=new', '--disable-gpu', '--no-sandbox'],
        ], 'http://localhost');*/
        $client = Client::createChromeClient();
        $depart_date=date('dm',strtotime($depart_date));

        $crawler = $client->request('GET', 'https://www.onetwotrip.com/ru/f/search/'.$depart_date.$origin.$destination.'?sc=E&ac=1&srcmarker2=newindex');

        // Подождите некоторое время, чтобы данные подгрузились
        $client->waitFor('.Vo739'); // Увеличьте время ожидания при необходимости

        // Теперь можно собирать данные, которые подгрузились в результате скролла
        $tickets = $crawler->filter('.Vo739')->each(function ($node)
        {
            $depart_time = $node->filter('.QPp8j')->first()
                ->each(function ($child)
                {
                    return $child->text('', true);
                });
            //
            $arrival_time = $node->filter('.QPp8j')->last()
                ->each(function ($child)
                {
                    return $child->text('', true);
                });
            //
            $airline=$node->filter('._7kfLX')
                ->each(function ($child)
                {
                    return $child->text('', true);
                });
            //
            $duration=$node->filter('.mBsCn')->filter('span')->first()
                ->each(function ($child)
                {
                    return $child->text('', true);
                });
            //
            $airline_logo=$node->filter('.NJzsX')
                ->each(function ($child)
                {
                    return $child->getAttribute('background-image');
                });
            //
            $price=$node->filter('._4-iO8')->filter('span')->first()
                ->each(function ($child)
                {
                    return $child->text('', true);
                });
            //
            $origin=$node->filter('.QVkKQ')->first()
                ->each(function ($child)
                {
                    return $child->text('', true);
                });
            //
            $destination=$node->filter('.QVkKQ')->last()
                ->each(function ($child)
                {
                    return $child->text('', true);
                });

            if($depart_time!=NULL && $arrival_time!=NULL) {
                $ticket =
                    [
                        'depart_time' => implode(' ', $depart_time),
                        'arrival_time' => implode(' ', $arrival_time),
                        'airline' => implode(' ', $airline),
                        'airline_logo' => implode(' ', $airline_logo),
                        'duration' => implode(' ', $duration),
                        'price' => implode(' ', $price),
                        'origin' => implode(' ', $origin),
                        'destination' => implode(' ', $destination),
                    ];
                return $ticket;
            }
            return [];
        });

        $i=0;
        foreach ($tickets as $ticket)
        {
            if($ticket==NULL)
            {
                unset($tickets[$i]);
            }
            $i++;
        }
        return $tickets;
    }
    public function FilterAirlines($tickets)
    {
        $airlines=[];
        foreach ($tickets as $ticket)
        {
            $airlines[]=
                [
                    'airline'=>$ticket['airline'],
                ];
        }

        $associativeArray = array_column($airlines, null, 'airline');

        $result=array_values($associativeArray);

        return $result;
    }

    public function parseFlightInfo($origin, $destination, $depart_date)
    {
        //$client = Client::createChromeClient();
        $client = Client::createChromeClient('/var/www/html/drivers/chromedriver', null, [
            'chromedriver_arguments' => ['--headless=new', '--disable-gpu', '--no-sandbox'],
        ], 'http://localhost');
        $depart_date=date('dm',strtotime($depart_date));

        $crawler = $client->request('GET', 'https://www.onetwotrip.com/_avia-search-proxy/search/v3?route='.$depart_date.$origin.$destination.'&ad=1&cn=0&in=0&showDeeplink=false&cs=E&source=google_adwords&priceIncludeBaggage=false&noClearNoBags=true&noMix=true&srcmarker=b2b_p1_b2b-generic_wld_s_kkwd-839752446941_c_20378146076_154201628133_676270550064_1010561&cryptoTripsVersion=61&doNotMap=true');

        $json = $crawler->filter('pre')->first()
            ->each(function ($child)
            {
                return $child->text('', true);
            });

        $json=json_decode($json[0]);
        //dd($json->trips);
        $tickets=[];

        foreach ($json->trips as $data)
        {
            if($destination==$data->to)//выводить только прямые билеты. Исправить
            {
                $startDateTime=explode('T', $data->startDateTime);
                $endDateTime=explode('T', $data->endDateTime);
                $duration=
                    [
                        'hours'=>floor($data->tripTimeMinutes / 60),
                        'minutes'=>$data->tripTimeMinutes % 60,
                    ];
                $tickets[] =
                    [
                        'depart_date' => $startDateTime[0],
                        'depart_datetime' => strtotime($data->startDateTime),
                        'depart_time' => $startDateTime[1],
                        'arrival_date' => $endDateTime[0],
                        'arrival_datetime' => strtotime($data->endDateTime),
                        'arrival_time' => $endDateTime[1],
                        'airline' => 'не найдено',
                        'duration' => $duration['hours'].' ч '.$duration['minutes'].' мин',
                        'price' => 'не найдено',
                        'origin' => $data->from,
                        'destination' => $data->to,
                        'flight_num' => $data->carrier.' '.$data->carrierTripNumber,
                    ];
            }
        }

        return($tickets);
    }
}

