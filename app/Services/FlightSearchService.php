<?php
// app/Services/FlightSearchService.php

namespace App\Services;

use Symfony\Component\Panther\Client;

class FlightSearchService
{
    public function parseFlightInfo($origin, $destination, $depart_date)
    {
        // Создаем клиента Panther
        //$client = Client::createChromeClient('/usr/bin/chromium-browser', null, ['--headless=new', '--disable-gpu', '--no-sandbox'], 'http://localhost');
        $client = Client::createChromeClient();
        $depart_date=date('dm',strtotime($depart_date));

        //$crawler = $client->request('GET', 'https://www.onetwotrip.com/ru/f/search/'.$depart_date.$origin.$destination.'?sc=E&ac=1&srcmarker2=newindex');
        $crawler = $client->request('GET', 'https://www.onetwotrip.com/ru/f/search/0202LEDMOW?sc=E&ac=1&srcmarker2=newindex');

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
                    'logo'=>$ticket['airline_logo'],
                ];
        }

        return $airlines;
    }
}
