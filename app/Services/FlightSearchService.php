<?php
// app/Services/FlightSearchService.php

namespace App\Services;

use App\Models\Airports;
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
         $client = Client::createChromeClient('/var/www/html/drivers/chromedriver', null, [
            'chromedriver_arguments' => ['--headless=new', '--disable-gpu', '--no-sandbox'],
        ], 'http://localhost');
         //$client = Client::createChromeClient();

        $depart_date=date('dm',strtotime($depart_date));
        if($return_date!='не установлено')
            $return_date=date('dm',strtotime($return_date));
        else
            $return_date=null;

        $crawler = $client->request('GET', 'https://www.onetwotrip.com/_avia-search-proxy/search/v3?route='.$depart_date.$origin.$destination.$return_date.'&ad='.$adults.'&cn='.$children.'&in='.$infants.'&showDeeplink=false&cs=E&source=google_adwords&priceIncludeBaggage=false&noClearNoBags=true&noMix=true&srcmarker=b2b_p1_b2b-generic_wld_s_kkwd-839752446941_c_20378146076_154201628133_676270550064_1010561&cryptoTripsVersion=61&doNotMap=true');

        $json = $crawler->filter('pre')->first()
            ->each(function ($child)
            {
                return $child->text('', true);
            });

        $json=json_decode($json[0]);
        $tickets=[];

        $transportationVariants=collect($json->transportationVariants);
        $prices=collect($json->prices);
        $trips=collect($json->trips);

        //dd($transportationVariants);

        $i=0;
        foreach ($transportationVariants as $transportationVariant)
        {
            $i++;
            foreach ($transportationVariant->tripRefs as $trip_ref)
            {
                //
                $depart_date=explode('T', $trips[$trip_ref->tripId]->startDateTime);
                $arrival_date=explode('T', $trips[$trip_ref->tripId]->endDateTime);
                $airline=Airlines::query()->where('code','=',$trips[$trip_ref->tripId]->carrier)->select('name')->first();

                $tickets[$i]['transfers'][]=
                    [
                        'origin'=>$trips[$trip_ref->tripId]->from,
                        'destination'=>$trips[$trip_ref->tripId]->to,
                        'depart_datetime'=>strtotime($trips[$trip_ref->tripId]->startDateTime),
                        'depart_date'=>$depart_date[0],
                        'arrival_datetime'=>strtotime($trips[$trip_ref->tripId]->endDateTime),
                        'arrival_date'=>$arrival_date[0],
                        'airline'=>$airline->name,
                        'airline_short'=>$trips[$trip_ref->tripId]->carrier,
                        'duration'=>(intdiv($trips[$trip_ref->tripId]->tripTimeMinutes, 60)).'ч '.($trips[$trip_ref->tripId]->tripTimeMinutes%60).'м',
                        'flight_num'=>$trips[$trip_ref->tripId]->carrier.' '.$trips[$trip_ref->tripId]->carrierTripNumber,
                        'transfer'=>'прямой',
                ];

                //

            }

            $tickets[$i]['id']=$i;
            $tickets[$i]['transfers_amount']=count($tickets[$i]['transfers'])-1;

            //
            if($tickets[$i]['transfers_amount']<1)
            {
                //
                $tickets[$i]['transfer']='прямой';
                $tickets[$i]['flight_num']=$trips[$trip_ref->tripId]->carrier.' '.$trips[$trip_ref->tripId]->carrierTripNumber;

                //
            }
            else
            {
                //
                $tickets[$i]['transfer']='пересадок: '.$tickets[$i]['transfers_amount'] ;
            }

            //
            $airline=Airlines::query()->where('code','=',$trips[$trip_ref->tripId]->carrier)->select('name')->first();
            $tickets[$i]['airline']=$airline->name;
            $tickets[$i]['airline_short']=$trips[$trip_ref->tripId]->carrier;

            //
            $depart_date=explode('T', $trips[$trip_ref->tripId]->startDateTime);
            $arrival_date=explode('T', $trips[$trip_ref->tripId]->endDateTime);
            $tickets[$i]['depart_datetime']=strtotime($trips[$trip_ref->tripId]->startDateTime);
            $tickets[$i]['depart_date']=$depart_date[0];
            $tickets[$i]['arrival_datetime']=strtotime($trips[$trip_ref->tripId]->endDateTime);
            $tickets[$i]['arrival_date']=$arrival_date[0];
            //
            $tickets[$i]['duration']=(intdiv($transportationVariant->totalJourneyTimeMinutes, 60)).'ч '.($transportationVariant->totalJourneyTimeMinutes%60).'м';
            //
            $tickets[$i]['origin']=$tickets[$i]['transfers'][0]['origin'];
            $tickets[$i]['destination']=$tickets[$i]['transfers'][$tickets[$i]['transfers_amount']]['destination'];

            //
            if($prices->where('transportationVariantIds.0', '=', $transportationVariant->id)->first()!=null)
                $tickets[$i]['price']=$prices->where('transportationVariantIds.0', '=', $transportationVariant->id)->first()->totalAmount;
            elseif ($prices->where('transportationVariantIds.1', '=', $transportationVariant->id)->first()!=null)
                $tickets[$i]['price']=$prices->where('transportationVariantIds.1', '=', $transportationVariant->id)->first()->totalAmount;
            else
                $tickets[$i]['price']=0;

            if($i>10)
            {
                break;
            }
        }

        //dd($tickets);
        return $tickets;
    }
}

