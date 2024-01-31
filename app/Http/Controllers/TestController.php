<?php

namespace App\Http\Controllers;

use Symfony\Component\Panther\Client;


class TestController extends Controller
{
    public function parseFlightInfo()
    {
// Создаем клиента Panther
        $client = Client::createChromeClient();

        //$client = static::createPantherClient();

        $crawler = $client->request('GET', 'https://www.onetwotrip.com/ru/f/search/0702OVBMOW?sc=E&ac=1&srcmarker2=newindex');

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
            $price=$node->filter('._4-iO8')->filter('span')
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

            $ticket=
                [
                    'depart_time'=>$depart_time,
                    'arrival_time'=>$arrival_time,
                    'airline'=>$airline,
                    'airline_logo'=>$airline_logo,
                    'duration'=>$duration,
                    'price'=>$price,
                    'origin'=>$origin,
                    'destination'=>$destination,
                ];
            return $ticket;
        });

        dd($tickets);
    }
}
