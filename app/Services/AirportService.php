<?php
// app/Services/AirportService.php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class AirportService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = '048a44328dd6efc65b762b8e8c20e30a';
    }

    public function get_ru_name($arr)
    {
        if(isset($arr['name_translations']['ru']))
        {
            return $arr['name_translations']['ru'];
        }
        else
            return $arr['name'];
    }

    public function getAllAirports()
    {
        // Проверяем, есть ли кэш для этого массива
        return Cache::remember('big_array_cache_key', now()->addHour(), function () {
            // Если кэша нет, создаем массив и кэшируем его
            return $this->generateAllAirports();
        });
    }

    public function generateAllAirports()
    {
        $response = Http::get('https://api.travelpayouts.com/data/ru/airports.json', ['x-access-token:' => $this->apiKey]);
        $body = $response->body();

        $airportData = json_decode($body, true);

        $response = Http::get('https://api.travelpayouts.com/data/ru/cities.json', ['x-access-token:' => $this->apiKey]);
        $body = $response->body();

        $cityData = json_decode($body, true);

        $response = Http::get('https://api.travelpayouts.com/data/ru/countries.json', ['x-access-token:' => $this->apiKey]);
        $body = $response->body();

        $countryData = json_decode($body, true);

        $result=[];

        foreach ($countryData as $country)
        {
            $country_name=$this->get_ru_name($country);

            foreach ($cityData as $city)
            {
                if($city['country_code']==$country['code'])
                {
                    $city_name=$this->get_ru_name($city);

                    $result[]=
                        [
                            'country_name'=>$country_name,
                            'city_name'=>$city_name,
                            'name'=>$city_name,
                            'iata_type'=>'city',
                            'code'=>$country_name.'/'.$country['code'].'/'.$city_name.'/'.$country['code'],
                            'city_code'=>$city['code'],
                            'airport_code'=>$city['code'],
                        ];

                    foreach ($airportData as $airport)
                    {
                        if($airport['city_code']==$city['code'] and $airport['iata_type']=='airport')
                        {
                            $airport_name=$this->get_ru_name($airport);
                            $result[]=
                                [
                                    //'country_name'=>$country_name,
                                    'city_name'=>$city_name,
                                    'city_code'=>$city['code'],
                                    'name'=>$airport_name,
                                    'airport_code'=>$airport['code'],
                                    'iata_type'=>'airport',
                                    'code'=>$country_name.'/'.$country['code'].'/'.$city_name.'/'.$country['code'].'/'.$airport_name.'/'.$airport['code'],
                                ];
                        }
                    }
                }
            }
        }


        //dd($result);
        return $result;
    }
}
?>
