<?php
// app/Services/FlightSearchService.php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Symfony\Component\Panther\Client;
use App\Models\Airlines;

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

    public function parseFlightInfo($origin, $destination, $depart_date)
    {
        $client = Client::createChromeClient('/var/www/html/drivers/chromedriver', null, [
            'chromedriver_arguments' => ['--headless=new', '--disable-gpu', '--no-sandbox'],
        ], 'http://localhost');
        //$client = Client::createChromeClient();

        $depart_date=date('dm',strtotime($depart_date));

        $crawler = $client->request('GET', 'https://www.onetwotrip.com/_avia-search-proxy/search/v3?route='.$depart_date.$origin.$destination.'&ad=1&cn=0&in=0&showDeeplink=false&cs=E&source=google_adwords&priceIncludeBaggage=false&noClearNoBags=true&noMix=true&srcmarker=b2b_p1_b2b-generic_wld_s_kkwd-839752446941_c_20378146076_154201628133_676270550064_1010561&cryptoTripsVersion=61&doNotMap=true');

        $json = $crawler->filter('pre')->first()
            ->each(function ($child)
            {
                return $child->text('', true);
            });

        $json=json_decode($json[0]);
        $tickets=[];

        $this->getAllAirlines();

        $transportationVariants=collect($json->transportationVariants);
        $prices=collect($json->prices);

        foreach ($json->trips as $data)
        {
            if($destination==$data->to)//выводить только прямые билеты. Исправить
            {
                $duration=
                    [
                        'hours'=>floor($data->tripTimeMinutes / 60),
                        'minutes'=>$data->tripTimeMinutes % 60,
                    ];

                $airline=Airlines::query()->where('code','=',$data->carrier)->select('name')->first();

                //price_start
                $transportationVariants_id=$transportationVariants->where('tripRefs.0.tripId', '=', $data->id)->first();
                if($transportationVariants_id==null)
                    $transportationVariants_id=$transportationVariants->where('tripRefs.1.tripId', '=', $data->id)->first();

                $price='не найдено';
                if($transportationVariants_id!=null)
                    $price=$prices->where('transportationVariantIds.0','=', $transportationVariants_id->id)->first();

                //$price=round($price->totalAmount);
                $price= number_format( $price->totalAmount , 0 , " "  , " " );

                //price_end

                $tickets[] =
                    [
                        'depart_datetime' => strtotime($data->startDateTime),
                        'arrival_datetime' => strtotime($data->endDateTime),
                        'airline' => $airline->name,
                        'duration' => $duration['hours'].' ч '.$duration['minutes'].' мин',
                        'price' => $price,
                        'origin' => $data->from,
                        'destination' => $data->to,
                        'flight_num' => $data->carrier.' '.$data->carrierTripNumber,
                    ];
            }
        }

        //dd($tickets);

        return($tickets);
    }
}

