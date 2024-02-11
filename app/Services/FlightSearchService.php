<?php
// app/Services/FlightSearchService.php

namespace App\Services;

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
                    'airline'=>$ticket['airline'],
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

        $ticket_cnt=0;
        foreach ($json->trips as $data)
        {
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
                if(isset($price->totalAmount))
                $price= $price->totalAmount;
                //dd($price);

                //price_end

                $depart_date=explode('T', $data->startDateTime);
                $arrival_date=explode('T', $data->endDateTime);
                $data_=
                    [
                        'id'=>$ticket_cnt,
                        'depart_datetime' => strtotime($data->startDateTime),
                        'depart_date' => $depart_date[0],
                        'arrival_datetime' => strtotime($data->endDateTime),
                        'arrival_date' => $arrival_date[0],
                        'airline' => $airline->name,
                        'duration' => $duration['hours'].' ч '.$duration['minutes'].' мин',
                        'price' => $price,
                        'origin' => $data->from,
                        'destination' => $data->to,
                        'flight_num' => $data->carrier.' '.$data->carrierTripNumber,
                        'transfer'=>'прямой',
                        'transfers_amount'=>0,

                    ];

                if($data->to != $destination and $data->from == $origin)
                {
                    $data_['transfer']='start';
                }

                if($data->to != $destination and $data->from != $origin)
                {
                    $data_['transfer']='transfer';
                }

                if($data->to == $destination and $data->from != $origin)
                {
                    $data_['transfer']='end';
                }

                $tickets[] =$data_;
            }
            $ticket_cnt++;

        }
        $ticket_buffer=[];
        $start_ticket=[];

        foreach ($tickets as $ticket)
        {
            if($ticket['transfer']=='прямой')
            {
                $tickets[$ticket['id']]['transfers_amount']=0;
            }
            else
            {
                if($ticket['transfer']=='start')
                {
                    $start_ticket=$ticket;
                    $start_ticket['transfers'][]=$ticket;
                    unset($tickets[$ticket['id']]);
                }

                $ticket_buffer=$start_ticket;

                if($ticket['transfer']=='end')
                {
                    $ticket_buffer['transfers'][]=$ticket;
                    $ticket_buffer['id']=$ticket['id'];

                    $tickets[$ticket['id']]['origin']=$ticket_buffer['origin'];
                    $tickets[$ticket['id']]['depart_datetime']=$ticket_buffer['depart_datetime'];

                    $tickets[$ticket['id']]=$ticket_buffer;

                    $tickets[$ticket['id']]['destination']=$ticket['destination'];
                    $tickets[$ticket['id']]['arrival_datetime']=$ticket['arrival_datetime'];
                    $tickets[$ticket['id']]['arrival_date']=$ticket['arrival_date'];

                    $tickets[$ticket['id']]['transfers_amount']++;
                    $tickets[$ticket['id']]['transfer']='пересадок: '. $tickets[$ticket['id']]['transfers_amount'];
                }
            }
        }


        return($tickets);
    }
}

